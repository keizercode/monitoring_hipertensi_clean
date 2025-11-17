    @extends('layouts.app')

    @section('title', 'Edit Profil - Tension Track')
    @section('header', 'Edit Profil')

    @section('content')
    <div class="max-w-3xl mx-auto">
        <div class="bg-white rounded-xl shadow-lg p-4 sm:p-6 md:p-8">
            <div class="flex items-center mb-4 sm:mb-6">
                <a href="{{ route('profile.show') }}" class="mr-3 sm:mr-4 text-gray-600 hover:text-gray-800">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <div class="flex-1 min-w-0">
                    <h2 class="text-lg sm:text-xl md:text-2xl font-bold text-gray-800 truncate">Edit Profil</h2>
                    <p class="text-sm sm:text-base text-gray-600 truncate">Perbarui informasi profil Anda</p>
                </div>
            </div>

            <!-- Upload Foto -->
            <div class="mb-6 sm:mb-8 text-center">
                <div class="relative inline-block">
                    <!-- Preview Image -->
                    @if(Auth::user()->photo === 'default.png')
                    <img id="preview"
                    src="{{ asset('default.png') }}"
                    class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-teal-500 shadow-lg mx-auto">
                    @else
                    <img id="preview"
                    src="{{ asset('storage/' . Auth::user()->photo) }}"
                    class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-teal-500 shadow-lg mx-auto">
                    @endif

                    <!-- Camera Button -->
                    <label for="photoInput" class="absolute bottom-0 right-0 w-10 h-10 bg-teal-500 rounded-full flex items-center justify-center cursor-pointer hover:bg-teal-600 transition shadow-lg">
                        <i class="fas fa-camera text-white"></i>
                    </label>
                </div>

                <!-- File Info -->
                <div class="mt-4 space-y-2">
                    <p class="text-xs sm:text-sm text-gray-600">
                        <i class="fas fa-info-circle mr-1"></i>
                        Format: JPEG, JPG, PNG, GIF
                    </p>
                    <p class="text-xs sm:text-sm text-gray-600">
                        <i class="fas fa-weight mr-1"></i>
                        Ukuran maksimal: 2 MB
                    </p>

                    <!-- File Name Display -->
                    <p id="fileName" class="text-xs sm:text-sm text-teal-600 font-medium hidden">
                        <i class="fas fa-file-image mr-1"></i>
                        <span id="fileNameText"></span>
                    </p>

                    <!-- Actions -->
                    <div class="flex flex-col sm:flex-row gap-2 justify-center mt-3">
                        <label for="photoInput" class="inline-flex items-center justify-center px-4 py-2 bg-teal-100 text-teal-700 rounded-lg cursor-pointer hover:bg-teal-200 transition text-xs sm:text-sm">
                            <i class="fas fa-upload mr-2"></i>Pilih Foto
                        </label>
                        <button type="button" onclick="removePhoto()" class="inline-flex items-center justify-center px-4 py-2 bg-red-100 text-red-700 rounded-lg hover:bg-red-200 transition text-xs sm:text-sm">
                            <i class="fas fa-times mr-2"></i>Hapus Foto
                        </button>
                    </div>
                </div>
            </div>

            <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data" class="space-y-4 sm:space-y-6">
                @csrf
                @method('PUT')
                <input type="hidden" name="remove_photo" id="removePhotoField" value="0">

                <input type="file" id="photoInput" name="photo" accept="image/jpeg,image/jpg,image/png,image/gif" class="hidden" onchange="previewImage(event)">

                <!-- Nama Lengkap -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2">NAMA LENGKAP</label>
                    <input type="text" name="name" value="{{ old('name', Auth::user()->name) }}" required
                        class="w-full px-3 sm:px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base">
                    @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2">EMAIL</label>
                    <input type="email" name="email" value="{{ old('email', Auth::user()->email) }}" required
                        class="w-full px-3 sm:px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base">
                    @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- NIP -->
                <div>
                    <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2">NIP</label>
                    <input type="text" name="nip" value="{{ old('nip', Auth::user()->nip) }}"
                        class="w-full px-3 sm:px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base"
                        placeholder="Masukkan NIP (opsional)">
                    @error('nip')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Photo Error -->
                @error('photo')
                    <div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-r-lg">
                        <div class="flex items-center">
                            <i class="fas fa-exclamation-circle text-red-500 mr-3"></i>
                            <p class="text-red-700 text-sm">{{ $message }}</p>
                        </div>
                    </div>
                @enderror

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row space-y-2 sm:space-y-0 sm:space-x-3 pt-4">
                    <a href="{{ route('profile.show') }}" class="flex-1 px-4 sm:px-6 py-3 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition text-center font-medium text-sm sm:text-base">
                        Batal
                    </a>
                    <button type="submit" class="flex-1 px-4 sm:px-6 py-3 bg-gradient-to-r from-teal-500 to-teal-600 text-white rounded-lg hover:from-teal-600 hover:to-teal-700 transition font-medium shadow-lg text-sm sm:text-base">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                </div>
            </form>

            <!-- Change Password Section -->
            <div class="mt-6 sm:mt-8 pt-6 sm:pt-8 border-t border-gray-200">
                <h3 class="text-base sm:text-lg font-bold text-gray-800 mb-4">Ubah Password</h3>

                <form action="{{ route('profile.password') }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2">PASSWORD SAAT INI</label>
                        <input type="password" name="current_password" required
                            class="w-full px-3 sm:px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base">
                        @error('current_password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2">PASSWORD BARU</label>
                        <input type="password" name="password" required
                            class="w-full px-3 sm:px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base">
                        @error('password')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label class="block text-xs sm:text-sm font-semibold text-gray-700 mb-2">KONFIRMASI PASSWORD BARU</label>
                        <input type="password" name="password_confirmation" required
                            class="w-full px-3 sm:px-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base">
                    </div>

                    <button type="submit" class="w-full px-4 sm:px-6 py-3 bg-gradient-to-r from-purple-500 to-purple-600 text-white rounded-lg hover:from-purple-600 hover:to-purple-700 transition font-medium shadow-lg text-sm sm:text-base">
                        <i class="fas fa-key mr-2"></i>Ubah Password
                    </button>
                </form>
            </div>
        </div>
    </div>
    @endsection

    @push('scripts')
    <script>
        let defaultAvatar = "{{ asset('default.png') }}&size=200&background=14B8A6&color=fff";
        let currentPhoto = "{{ Auth::user()->photo ? asset('storage/' . Auth::user()->photo) : '' }}";

        function previewImage(event) {
            const file = event.target.files[0];

            if (file) {
                // Validate file type
                const validTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                if (!validTypes.includes(file.type)) {
                    alert('Format file tidak didukung!\nGunakan: JPEG, JPG, PNG, atau GIF');
                    event.target.value = '';
                    return;
                }

                // Validate file size (2MB = 2097152 bytes)
                if (file.size > 2097152) {
                    alert('Ukuran file terlalu besar!\nMaksimal: 2 MB\nUkuran file Anda: ' + (file.size / 1048576).toFixed(2) + ' MB');
                    event.target.value = '';
                    return;
                }

                // Preview image
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('preview').src = e.target.result;
                    currentPhoto = e.target.result;
                }
                reader.readAsDataURL(file);

                // Show file name
                document.getElementById('fileName').classList.remove('hidden');
                document.getElementById('fileNameText').textContent = file.name;
            }
        }

    function removePhoto() {
        document.getElementById('preview').src = defaultAvatar;
        document.getElementById('photoInput').value = '';
        document.getElementById('fileName').classList.add('hidden');

        // 🔥 INI yang paling penting
        document.getElementById('removePhotoField').value = "1";

        const toast = document.createElement('div');
        toast.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
        toast.innerHTML = '<i class="fas fa-check-circle mr-2"></i>Foto akan dihapus saat Anda klik Simpan';
        document.body.appendChild(toast);

        setTimeout(() => {
        toast.style.transition = 'opacity 0.5s';
        toast.style.opacity = '0';
        setTimeout(() => toast.remove(), 500);
        }, 3000);
     }
    </script>
    @endpush
