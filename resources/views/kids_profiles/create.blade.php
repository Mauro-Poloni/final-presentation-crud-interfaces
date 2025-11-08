@extends('layouts.app')

@section('title', 'Add Kid')

@section('content')
    <div class="bg-white shadow-md rounded-3xl p-6 max-w-xl mx-auto border-t-8 border-yellow-300">
        <h2 class="text-3xl font-bold text-yellow-600 mb-6 flex items-center gap-2">
            <i data-lucide="star"></i> Create New Kid Profile
        </h2>

        <form action="{{ route('kids_profiles.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block font-medium text-gray-700">Name</label>
                <input type="text" name="name" class="w-full border-pink-300 rounded-full p-2 focus:ring focus:ring-pink-200" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Age</label>
                <input type="number" name="age" min="1" max="15" class="w-full border-yellow-300 rounded-full p-2 focus:ring focus:ring-yellow-200" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Favorite Color</label>
                <select name="favorite_color" class="w-full border-green-300 rounded-full p-2 bg-white">
                    <option value="blue">Blue</option>
                    <option value="red">Red</option>
                    <option value="green">Green</option>
                    <option value="yellow">Yellow</option>
                    <option value="pink">Pink</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Bio</label>
                <textarea name="bio" rows="3" class="w-full border-blue-300 rounded-2xl p-2"></textarea>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Avatar</label>
                <input type="file" name="avatar" class="w-full border-green-300 rounded-full p-2 bg-white">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('kids_profiles.index') }}" class="px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 flex items-center gap-2">
                    <i data-lucide="smile-plus"></i> Save
                </button>
            </div>
        </form>
    </div>
@endsection
