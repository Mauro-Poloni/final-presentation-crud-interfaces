@extends('layouts.app')

@section('title', 'Edit Kid')

@section('content')

    <div class="max-w-xl mx-auto bg-white shadow-2xl rounded-[3rem] p-8 border-t-[12px] border-green-500 overflow-hidden">

        <h2 class="text-4xl font-extrabold text-green-600 mb-8 border-b-2 border-dashed border-yellow-300 pb-4 flex items-center justify-center gap-3">
            <i data-lucide="lollipop" class="w-8 h-8 text-pink-500"></i>
            <span class="tracking-wide">Edit Kid Profile</span>
        </h2>

        <form action="{{ route('kids_profiles.update', $kids_profile) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-gray-700 mb-1">Name</label>
                    <input type="text" name="name" value="{{ $kids_profile->name }}"
                           class="w-full border-pink-400 rounded-full p-3 text-lg font-semibold shadow-inner focus:ring-4 focus:ring-pink-200 focus:border-pink-500 transition"
                           required>
                </div>
                <div>
                    <label class="block font-bold text-gray-700 mb-1">Age</label>
                    <input type="number" name="age" value="{{ $kids_profile->age }}" min="1" max="15"
                           class="w-full border-green-400 rounded-full p-3 text-lg font-semibold shadow-inner focus:ring-4 focus:ring-green-200 focus:border-green-500 transition"
                           required>
                </div>
            </div>

            <div>
                <label class="block font-bold text-gray-700 mb-1">Favorite Color</label>
                <select name="favorite_color"
                        class="w-full border-yellow-400 rounded-full p-3 text-lg bg-white font-semibold shadow-inner focus:ring-4 focus:ring-yellow-200 focus:border-yellow-500 transition">
                    @foreach(['pink', 'blue', 'red', 'green', 'yellow'] as $color)
                        <option value="{{ $color }}" {{ $kids_profile->favorite_color == $color ? 'selected' : '' }}>
                            {{ ucfirst($color) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-bold text-gray-700 mb-1">Bio</label>
                <textarea name="bio" rows="3"
                          class="w-full border-blue-400 rounded-2xl p-4 text-gray-700 shadow-inner focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition"
                          placeholder="Tell us about your little star!">{{ $kids_profile->bio }}</textarea>
            </div>

            <div class="p-4 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-300 flex flex-col sm:flex-row items-center gap-6">
                <div class="flex-shrink-0">
                    <label class="block text-sm font-medium text-gray-500 mb-2">Current Avatar:</label>
                    @if($kids_profile->avatar_path)
                        <img src="{{ asset('storage/'.$kids_profile->avatar_path) }}"
                             class="w-24 h-24 rounded-full object-cover border-4 border-pink-400 shadow-md">
                    @else
                        <div class="w-24 h-24 rounded-full bg-gray-200 flex items-center justify-center text-gray-500 border border-dashed">
                            <i data-lucide="user-circle" class="w-10 h-10"></i>
                        </div>
                    @endif
                </div>
                <div class="flex-grow w-full">
                    <label class="block font-bold text-gray-700 mb-1 flex items-center gap-2">
                        <i data-lucide="upload" class="w-5 h-5 text-green-500"></i> Replace Avatar
                    </label>
                    <input type="file" name="avatar"
                           class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-green-100 file:text-green-600 hover:file:bg-green-200 cursor-pointer">
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t-2 border-dashed border-gray-100">
                <a href="{{ route('kids_profiles.index') }}"
                   class="px-6 py-3 bg-gray-300 text-gray-700 rounded-full font-bold hover:bg-gray-400 transition transform hover:scale-105">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-green-500 text-white px-6 py-3 rounded-full font-extrabold shadow-lg shadow-green-300/50 hover:bg-green-600 transition flex items-center gap-2 transform hover:scale-105">
                    <i data-lucide="check-circle-2"></i> Update Profile
                </button>
            </div>
        </form>
    </div>
@endsection