@extends('layouts.app')

@section('title', 'Edit Kid')

@section('content')
    <div class="bg-white shadow-md rounded-3xl p-6 max-w-xl mx-auto border-t-8 border-green-300">
        <h2 class="text-3xl font-bold text-green-600 mb-6 flex items-center gap-2">
            <i data-lucide="edit-3"></i> Edit Kid Profile
        </h2>

        <form action="{{ route('kids_profiles.update', $kids_profile) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium text-gray-700">Name</label>
                <input type="text" name="name" value="{{ $kids_profile->name }}" class="w-full border-pink-300 rounded-full p-2" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Age</label>
                <input type="number" name="age" value="{{ $kids_profile->age }}" min="1" max="15" class="w-full border-yellow-300 rounded-full p-2" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Favorite Color</label>
                <select name="favorite_color" class="w-full border-green-300 rounded-full p-2 bg-white">
                    @foreach(['blue','red','green','yellow','pink'] as $color)
                        <option value="{{ $color }}" {{ $kids_profile->favorite_color == $color ? 'selected' : '' }}>
                            {{ ucfirst($color) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Bio</label>
                <textarea name="bio" rows="3" class="w-full border-blue-300 rounded-2xl p-2">{{ $kids_profile->bio }}</textarea>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Avatar</label>
                @if($kids_profile->avatar_path)
                    <img src="{{ asset('storage/'.$kids_profile->avatar_path) }}" class="w-24 h-24 rounded-full mb-3 border-4 border-green-300 object-cover">
                @endif
                <input type="file" name="avatar" class="w-full border-green-300 rounded-full p-2 bg-white">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('kids_profiles.index') }}" class="px-4 py-2 bg-gray-300 rounded-full hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-500 text-white rounded-full hover:bg-green-600 flex items-center gap-2">
                    <i data-lucide="check"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection
