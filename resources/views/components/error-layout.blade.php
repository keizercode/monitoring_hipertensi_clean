@props(['title', 'code', 'message', 'description', 'illustration'])

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Error' }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @keyframes float {
            0% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0); }
        }
        .float-animation {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</head>

<body class="bg-gray-50 min-h-screen flex items-center justify-center p-6">

    <div class="text-center max-w-md w-full">
        <div class="mb-6 flex justify-center">
            {!! $illustration !!}
        </div>

        <h1 class="text-5xl font-extrabold text-teal-600">{{ $code }}</h1>

        <h2 class="text-xl text-gray-700 font-semibold mt-3">{{ $message }}</h2>

        <p class="text-gray-500 mt-2 mb-8">
            {{ $description }}
        </p>

        <a href="{{ url('/') }}"
           class="px-6 py-3 bg-teal-600 text-white rounded-xl shadow hover:bg-teal-700 transition">
            Kembali ke Beranda
        </a>

        <p class="mt-6 text-sm text-gray-400">
            TensiTrack © {{ date('Y') }}
        </p>
    </div>

</body>
</html>
