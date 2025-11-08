@extends('layouts.app')

@section('title', 'Add Kid')

@section('content')

    <div class="max-w-xl mx-auto bg-white shadow-2xl rounded-[3rem] p-8 border-t-[12px] border-yellow-500 overflow-hidden">

        <h2 class="text-4xl font-extrabold text-yellow-600 mb-8 border-b-2 border-dashed border-pink-300 pb-4 flex items-center justify-center gap-3">
            <i data-lucide="party-popper" class="w-8 h-8 text-pink-500"></i>
            <span class="tracking-wide">Create New Kid Profile</span>
        </h2>

        <form action="{{ route('kids_profiles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div class="grid grid-cols-2 gap-4">
                <div>
                    <label class="block font-bold text-gray-700 mb-1">Name</label>
                    <input type="text" name="name"
                           class="w-full border-pink-400 rounded-full p-3 text-lg font-semibold shadow-inner focus:ring-4 focus:ring-pink-200 focus:border-pink-500 transition"
                           required>
                </div>
                <div>
                    <label class="block font-bold text-gray-700 mb-1">Age</label>
                    <input type="number" name="age" min="1" max="15"
                           class="w-full border-green-400 rounded-full p-3 text-lg font-semibold shadow-inner focus:ring-4 focus:ring-green-200 focus:border-green-500 transition"
                           required>
                </div>
            </div>

            <div>
                <label class="block font-bold text-gray-700 mb-1">Favorite Color</label>
                <select name="favorite_color"
                        class="w-full border-yellow-400 rounded-full p-3 text-lg bg-white font-semibold shadow-inner focus:ring-4 focus:ring-yellow-200 focus:border-yellow-500 transition">
                    <option value="pink">Pink</option>
                    <option value="blue">Blue</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                </select>
            </div>

            <div>
                <label class="block font-bold text-gray-700 mb-1">Bio (Tell us about your little star!)</label>
                <textarea name="bio" rows="3"
                          class="w-full border-blue-400 rounded-2xl p-4 text-gray-700 shadow-inner focus:ring-4 focus:ring-blue-200 focus:border-blue-500 transition placeholder:italic"
                          placeholder="E.g., loves playing with blocks, drawing funny animals, and chasing butterflies."></textarea>
            </div>

            <div class="p-4 bg-gray-50 rounded-2xl border-2 border-dashed border-gray-300">
                <label class="block font-bold text-gray-700 mb-2 flex items-center gap-2">
                    <i data-lucide="image" class="w-5 h-5 text-pink-500"></i> Choose Avatar
                </label>
                <input type="file" name="avatar"
                       class="w-full text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-bold file:bg-pink-100 file:text-pink-600 hover:file:bg-pink-200 cursor-pointer">
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t-2 border-dashed border-gray-100">
                <a href="{{ route('kids_profiles.index') }}"
                   class="px-6 py-3 bg-gray-300 text-gray-700 rounded-full font-bold hover:bg-gray-400 transition transform hover:scale-105">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-pink-500 text-white px-6 py-3 rounded-full font-extrabold shadow-lg shadow-pink-300/50 hover:bg-pink-600 transition flex items-center gap-2 transform hover:scale-105">
                    <i data-lucide="wand-2"></i> Save Star
                </button>
            </div>
        </form>
    </div>
@endsection