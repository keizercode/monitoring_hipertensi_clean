@extends('layouts.app')

@section('title', 'Profil - Tension Track')
@section('header', 'Profil Saya')

@section('content')
<div class="max-w-4xl mx-auto">
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <!-- Header with Photo -->
        <div class="bg-gradient-to-r from-teal-500 to-teal-600 p-6 sm:p-8 text-white">
            <div class="flex flex-col sm:flex-row items-center sm:items-start space-y-4 sm:space-y-0 sm:space-x-6">
                <div class="relative group">
                @if(Auth::user()->photo === 'default.png')
                <img id="preview"
                src="{{ asset('default.png') }}"
                class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-teal-500 shadow-lg mx-auto">
                @else
                <img id="preview"
                src="{{ asset('storage/' . Auth::user()->photo) }}"
                class="w-24 h-24 sm:w-32 sm:h-32 rounded-full object-cover border-4 border-teal-500 shadow-lg mx-auto">
                @endif

                    <!-- Edit Badge -->
                    <a href="{{ route('profile.edit') }}"
                       class="absolute bottom-0 right-0 w-10 h-10 bg-white rounded-full flex items-center justify-center shadow-lg hover:bg-gray-100 transition">
                        <i class="fas fa-camera text-teal-600"></i>
                    </a>
                </div>

                <div class="text-center sm:text-left flex-1">
                    <h2 class="text-2xl sm:text-3xl font-bold">{{ Auth::user()->name }}</h2>
                    <p class="text-teal-100 mt-1">{{ Auth::user()->email }}</p>
                    @if(Auth::user()->nip)
                        <p class="text-teal-100 mt-1">
                            <i class="fas fa-id-card mr-2"></i>NIP: {{ Auth::user()->nip }}
                        </p>
                    @endif
                    <p class="text-teal-100 text-sm mt-2">
                        <i class="fas fa-calendar mr-2"></i>Terdaftar: {{ Auth::user()->created_at->format('d F Y') }}
                    </p>
                </div>
            </div>
        </div>

        <!-- Content -->
        <div class="p-6 sm:p-8">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 space-y-4 sm:space-y-0">
                <h3 class="text-xl font-bold text-gray-800">Informasi Profil</h3>
                <a href="{{ route('profile.edit') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-4 py-2 bg-teal-500 text-white rounded-lg hover:bg-teal-600 transition text-sm sm:text-base">
                    <i class="fas fa-edit mr-2"></i>Edit Profil
                </a>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600 mb-1">Nama Lengkap</p>
                    <p class="font-semibold text-gray-800">{{ Auth::user()->name }}</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600 mb-1">Email</p>
                    <p class="font-semibold text-gray-800 break-all">{{ Auth::user()->email }}</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600 mb-1">NIP</p>
                    <p class="font-semibold text-gray-800">{{ Auth::user()->nip ?? '-' }}</p>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg">
                    <p class="text-sm text-gray-600 mb-1">Terdaftar Sejak</p>
                    <p class="font-semibold text-gray-800">{{ Auth::user()->created_at->format('d F Y') }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
