<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Email - Tension Track</title>
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
        </div>

        <div class="bg-white rounded-2xl shadow-xl p-6 sm:p-8">
            <div class="text-center mb-6">
                <div class="w-20 h-20 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-envelope text-yellow-600 text-3xl"></i>
                </div>
                <h2 class="text-xl sm:text-2xl font-bold text-gray-800 mb-2">Verifikasi Email Anda</h2>
                <p class="text-gray-600 text-sm sm:text-base">
                    Kami telah mengirim link verifikasi ke email Anda. Silakan cek inbox atau folder spam.
                </p>
            </div>

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-500 p-4 mb-6 rounded-r-lg">
                    <p class="text-green-700 text-sm">{{ session('success') }}</p>
                </div>
            @endif

            <div class="bg-teal-50 border-l-4 border-teal-500 p-4 mb-6 rounded-r-lg">
                <p class="text-teal-800 text-sm">
                    <i class="fas fa-info-circle mr-2"></i>
                    Tidak menerima email?
                </p>
            </div>

            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button type="submit" class="w-full bg-gradient-to-r from-teal-500 to-teal-600 text-white py-3 rounded-lg font-semibold hover:from-teal-600 hover:to-teal-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5 text-sm sm:text-base mb-4">
                    <i class="fas fa-redo mr-2"></i>Kirim Ulang Email Verifikasi
                </button>
            </form>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="w-full text-gray-600 hover:text-gray-800 font-medium text-sm sm:text-base">
                    <i class="fas fa-sign-out-alt mr-2"></i>Logout
                </button>
            </form>
        </div>
    </div>
</body>
</html>
