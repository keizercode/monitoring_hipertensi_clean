<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile.show');
    }

    public function edit()
    {
        return view('profile.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'nip' => 'nullable|string|unique:users,nip,' . $user->id,
            'photo' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048', // Max 2MB
        ], [
            'photo.image' => 'File harus berupa gambar',
            'photo.mimes' => 'Format foto harus: JPEG, JPG, PNG, atau GIF',
            'photo.max' => 'Ukuran foto maksimal 2MB',
        ]);

        $data = $request->only(['name', 'email', 'nip']);

        if ($request->remove_photo == 1) {
            if ($user->photo && $user->photo !== 'default.png' && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            $data['photo'] = 'default.png';
        }

        if ($request->hasFile('photo')) {
            // Delete old photo if exists
            if ($user->photo && $user->photo !== 'default.png' && Storage::disk('public')->exists($user->photo)) {
                Storage::disk('public')->delete($user->photo);
            }

            // Store new photo
            $data['photo'] = $request->file('photo')->store('photos', 'public');
        }

        /** @var \App\Models\User $user */
        $user->update($data);

        return redirect()->route('profile.show')
            ->with('success', 'Profil berhasil diperbarui!');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6|confirmed',
        ], [
            'current_password.required' => 'Password saat ini wajib diisi',
            'password.required' => 'Password baru wajib diisi',
            'password.min' => 'Password minimal 6 karakter',
            'password.confirmed' => 'Konfirmasi password tidak cocok',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Password saat ini salah.']);
        }

        /** @var \App\Models\User $user */
        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return back()->with('success', 'Password berhasil diperbarui!');
    }
}
