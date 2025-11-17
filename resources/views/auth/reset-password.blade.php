<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password - Tension Track</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        * { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-teal-50 to-blue-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <div class="text-center mb-6">
            <div class="flex items-center justify-center gap-4 sm:gap-6 mb-6">
                <img src="{{ asset('images/ppn-logo.png') }}" alt="PPN" class="h-16 w-auto sm:h-20">
                <img src="{{ asset('images/upi-logo.png') }}" alt="UPI" class="h-16 w-auto sm:h-20">
            </div>

            <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl shadow-lg mb-3">
                <i class="fas fa-heartbeat text-white text-2xl sm:text-3xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-1">Tension Track</h1>
            <p class="text-teal-600 font-medium text-sm sm:text-base">Reset Password</p>
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">
            <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Buat Password Baru</h2>
            <p class="text-gray-600 mb-6 text-sm sm:text-base">Masukkan password baru Anda</p>

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg">
                    <p class="text-red-700 text-sm">{{ $errors->first() }}</p>
                </div>
            @endif

            <form action="{{ route('password.update') }}" method="POST">
                @csrf

                <input type="hidden" name="token" value="{{ $token }}">

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">EMAIL</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email', request()->email) }}" required
                               class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="block text-sm font-medium text-gray-700 mb-2">PASSWORD BARU</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password" id="password" required
                               class="w-full pl-10 pr-12 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base"
                               placeholder="Minimal 6 karakter">
                        <button type="button" onclick="togglePassword('password', 'eye1')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye" id="eye1"></i>
                        </button>
                    </div>
                </div>

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">KONFIRMASI PASSWORD</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-lock"></i>
                        </span>
                        <input type="password" name="password_confirmation" id="password_confirmation" required
                               class="w-full pl-10 pr-12 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base"
                               placeholder="Ulangi password">
                        <button type="button" onclick="togglePassword('password_confirmation', 'eye2')" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-gray-600">
                            <i class="fas fa-eye" id="eye2"></i>
                        </button>
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white py-3 rounded-lg font-semibold hover:from-teal-600 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm sm:text-base">
                    <i class="fas fa-check mr-2"></i>Reset Password
                </button>
            </form>
        </div>
    </div>

    <script>
        function togglePassword(id, iconId) {
            const input = document.getElementById(id);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }
    </script>
</body>
</html>
