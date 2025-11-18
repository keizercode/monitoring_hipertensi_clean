<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

class EmailVerificationController extends Controller
{
    // Show verification notice
    public function notice(Request $request)
{
    // Jika user sudah verifikasi, redirect langsung ke dashboard
    if ($request->user()->hasVerifiedEmail()) {
        return redirect()->route('dashboard');
    }

    return view('auth.verify-email');
}

    // Verify email
    public function verify(EmailVerificationRequest $request)
    {
        $request->fulfill();

        return redirect()->route('dashboard')
            ->with('success', 'Email berhasil diverifikasi!');
    }

    // Resend verification email
    public function resend(Request $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->route('dashboard');
        }

        $request->user()->sendEmailVerificationNotification();

        return back()->with('success', 'Link verifikasi telah dikirim ulang ke email Anda!');
    }
}
