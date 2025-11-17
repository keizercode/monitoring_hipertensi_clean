<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Tension Track</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        * { font-family: 'Poppins', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-br from-teal-50 to-blue-50 min-h-screen flex items-center justify-center p-4">

    <div class="w-full max-w-md">
        <!-- Logo Section -->
        <div class="text-center mb-6">
            <div class="flex items-center justify-center gap-4 sm:gap-6 mb-6">
                <img src="{{ asset('images/ppn-logo.png') }}" alt="PPN" class="h-16 w-auto sm:h-20">
                <img src="{{ asset('images/upi-logo.png') }}" alt="UPI" class="h-16 w-auto sm:h-20">
            </div>

            <div class="inline-flex items-center justify-center w-16 h-16 sm:w-20 sm:h-20 bg-gradient-to-br from-teal-500 to-teal-600 rounded-2xl shadow-lg mb-3">
                <i class="fas fa-heartbeat text-white text-2xl sm:text-3xl"></i>
            </div>
            <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-1">Tension Track</h1>
            <p class="text-teal-600 font-medium text-sm sm:text-base">Lupa Password</p>
        </div>

        <!-- Card -->
        <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">
            <div class="text-center mb-6">
                <div class="w-16 h-16 bg-teal-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-key text-teal-600 text-2xl"></i>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Lupa Password?</h2>
                <p class="text-gray-600 text-sm sm:text-base">
                    Masukkan email Anda dan kami akan mengirimkan link untuk reset password
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle text-green-500 mr-3"></i>
                        <p class="text-green-700 text-sm">{{ session('success') }}</p>
                    </div>
                </div>
            @endif

            @if($errors->any())
                <div class="bg-red-50 border-l-4 border-red-500 p-4 mb-6 rounded-r-lg">
                    <p class="text-red-700 text-sm">{{ $errors->first() }}</p>
                </div>
            @endif

            <form action="{{ route('password.email') }}" method="POST">
                @csrf

                <div class="mb-6">
                    <label class="block text-sm font-medium text-gray-700 mb-2">EMAIL</label>
                    <div class="relative">
                        <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <input type="email" name="email" value="{{ old('email') }}" required
                               class="w-full pl-10 pr-4 py-3 rounded-lg border border-gray-300 focus:border-teal-500 focus:ring-2 focus:ring-teal-200 transition text-sm sm:text-base"
                               placeholder="email@example.com">
                    </div>
                </div>

                <button type="submit" class="w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white py-3 rounded-lg font-semibold hover:from-teal-600 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm sm:text-base mb-4">
                    <i class="fas fa-paper-plane mr-2"></i>Kirim Link Reset
                </button>

                <a href="{{ route('login') }}" class="block text-center text-teal-600 hover:text-teal-700 font-medium text-sm sm:text-base">
                    <i class="fas fa-arrow-left mr-2"></i>Kembali ke Login
                </a>
            </form>
        </div>

        <div class="text-center mt-6">
            <p class="text-xs sm:text-sm text-gray-500">
                © 2025 PPN UPI | Program Profesi Ners
            </p>
        </div>
    </div>
</body>
</html>
