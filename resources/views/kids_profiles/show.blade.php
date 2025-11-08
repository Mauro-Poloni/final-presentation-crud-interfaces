@extends('layouts.app')

@section('title', 'Kid Profile')

@section('content')
    <div class="bg-white shadow-md rounded-3xl p-6 max-w-xl mx-auto border-t-8 border-blue-300 text-center">
        <h2 class="text-3xl font-bold text-blue-600 mb-6 flex justify-center items-center gap-2">
            <i data-lucide="baby"></i> Profile Details
        </h2>

        <div class="flex flex-col items-center mb-4">
            @if($kids_profile->avatar_path)
                <img src="{{ asset('storage/'.$kids_profile->avatar_path) }}"
                     class="w-28 h-28 rounded-full object-cover border-4 border-yellow-300 shadow-lg mb-3">
            @else
                <i data-lucide="user" class="text-gray-400 w-16 h-16"></i>
            @endif
            <h3 class="text-xl font-bold text-pink-600">{{ $kids_profile->name }}</h3>
            <p class="text-gray-600 text-sm">Age: {{ $kids_profile->age }} years</p>
            <p class="text-sm mt-1">Favorite color: <span class="capitalize font-semibold text-{{ $kids_profile->favorite_color }}-500">{{ $kids_profile->favorite_color }}</span></p>
        </div>

        <div class="bg-pink-50 rounded-2xl p-4 text-gray-700 text-sm">
            <p class="whitespace-pre-line">{{ $kids_profile->bio ?? 'No bio available.' }}</p>
        </div>

        <div class="flex justify-center gap-3 mt-6">
            <a href="{{ route('kids_profiles.index') }}"
               class="px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">Back</a>
            <a href="{{ route('kids_profiles.edit', $kids_profile) }}"
               class="px-4 py-2 bg-blue-500 text-white rounded-full hover:bg-blue-600 flex items-center gap-2">
                <i data-lucide="edit"></i> Edit
            </a>
        </div>
    </div>
@endsection
