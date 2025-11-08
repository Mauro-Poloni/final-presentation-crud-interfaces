@extends('layouts.app')

@section('title', 'Kid Profile')

@section('content')

    @php
        $main_color = $kids_profile->favorite_color;
        $border_class = 'border-' . $main_color . '-500';
        $text_class = 'text-' . $main_color . '-600';
        $bg_class = 'bg-' . $main_color . '-50';
    @endphp

    <div class="max-w-xl mx-auto bg-white shadow-2xl rounded-[3rem] p-8 border-t-[12px] {{ $border_class }} overflow-hidden text-center">

        <h2 class="text-4xl font-extrabold {{ $text_class }} mb-8 border-b-2 border-dashed border-gray-200 pb-4 flex items-center justify-center gap-3">
            <i data-lucide="crown" class="w-8 h-8 text-yellow-500"></i>
            <span class="tracking-wide">{{ $kids_profile->name }}'s World</span>
        </h2>

        <div class="flex flex-col items-center mb-6">
            @if($kids_profile->avatar_path)
                <img src="{{ asset('storage/'.$kids_profile->avatar_path) }}"
                     class="w-32 h-32 rounded-full object-cover border-6 border-pink-400 p-1 shadow-xl mb-4 transition duration-300 hover:scale-105">
            @else
                <div class="w-32 h-32 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 border-4 border-dashed border-gray-400 mb-4">
                    <i data-lucide="user-circle" class="w-16 h-16"></i>
                </div>
            @endif

            <p class="text-xl font-bold text-gray-700 mb-1 flex items-center gap-2">
                <i data-lucide="cake" class="w-6 h-6 text-green-500"></i> Age: <span class="text-green-600">{{ $kids_profile->age }}</span> years old
            </p>
            <p class="text-lg font-semibold text-gray-600 flex items-center gap-2">
                <span class="w-5 h-5 rounded-full {{ $border_class }} bg-{{ $main_color }}-400 border-2"></span>
                Favorite Color: <span class="capitalize {{ $text_class }}">{{ $kids_profile->favorite_color }}</span>
            </p>
        </div>

        <div class="{{ $bg_class }} rounded-3xl p-6 text-gray-700 text-lg border-4 border-dashed {{ $border_class }}/50 shadow-inner">
            <p class="font-bold text-xl {{ $text_class }} mb-3 flex items-center justify-center gap-2">
                <i data-lucide="message-square" class="w-6 h-6"></i> About Me
            </p>
            <p class="whitespace-pre-line leading-relaxed italic">
                {{ $kids_profile->bio ?? 'No special biography recorded yet. This little star is still writing their story!' }}
            </p>
        </div>

        <div class="flex justify-center gap-4 mt-8">
            <a href="{{ route('kids_profiles.edit', $kids_profile) }}"
               class="bg-yellow-400 text-gray-800 px-6 py-3 rounded-full font-extrabold shadow-lg shadow-yellow-300/50 hover:bg-yellow-500 transition flex items-center gap-2 transform hover:scale-105">
                <i data-lucide="edit"></i> Update Fun Facts
            </a>
            <a href="{{ route('kids_profiles.index') }}"
               class="bg-gray-400 text-gray-800 px-6 py-3 rounded-full font-extrabold shadow-lg shadow-gray-300/50 hover:bg-gray-100 transition flex items-center gap-2 transform hover:scale-105">
                <i data-lucide="home"></i> Back Home
            </a>
        </div>
    </div>
@endsection