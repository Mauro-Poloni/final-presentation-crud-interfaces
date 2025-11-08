@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="max-w-xl mx-auto bg-white rounded-xl shadow-2xl p-6 border-t-4 border-blue-500">
        <h2 class="text-3xl font-extrabold text-gray-800 mb-6 flex items-center gap-3 border-b pb-4">
            <i data-lucide="pencil-line" class="w-7 h-7 text-blue-500"></i> Edit Post
        </h2>

        <form action="{{ route('social_posts.update', $social_post) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium text-sm text-gray-700 mb-1">Username</label>
                <input type="text" name="username" value="{{ $social_post->username }}"
                       class="w-full border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-150"
                       required>
            </div>

            <div>
                <label class="block font-medium text-sm text-gray-700 mb-1">Visibility</label>
                <div class="relative">
                    <select name="visibility"
                            class="w-full border-gray-300 rounded-lg p-3 bg-white appearance-none pr-10 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-150">
                        @foreach(['public','friends','private'] as $option)
                            <option value="{{ $option }}" {{ $social_post->visibility == $option ? 'selected' : '' }}
                            class="@if($option == 'public') text-green-600 @elseif($option == 'private') text-red-600 @else text-yellow-600 @endif">
                                {{ ucfirst($option) }}
                            </option>
                        @endforeach
                    </select>
                    <i data-lucide="chevron-down" class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400 pointer-events-none"></i>
                </div>
            </div>

            <div>
                <label class="block font-medium text-sm text-gray-700 mb-1">Content</label>
                <textarea name="content" rows="4"
                          class="w-full border-gray-300 rounded-lg p-3 focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition duration-150">{{ $social_post->content }}</textarea>
            </div>

            <div>
                <label class="block font-medium text-sm text-gray-700 mb-1">Update Image (optional)</label>
                @if($social_post->image_path)
                    <div class="mb-4 p-4 border border-gray-200 rounded-lg bg-gray-50">
                        <p class="text-xs text-gray-500 mb-2">Current Image:</p>
                        <img src="{{ asset('storage/'.$social_post->image_path) }}" class="rounded-lg w-full max-h-64 object-cover border border-gray-300">
                    </div>
                @endif
                <div class="flex items-center space-x-2 p-3 border border-gray-300 rounded-lg bg-gray-50 hover:bg-gray-100 transition duration-150">
                    <i data-lucide="image" class="w-5 h-5 text-gray-500"></i>
                    <input type="file" name="image" class="text-sm text-gray-600 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition duration-150">
                </div>
            </div>

            <div class="flex justify-end pt-3 border-t border-gray-100 gap-3">
                <a href="{{ route('social_posts.index') }}" class="px-5 py-2 text-gray-600 rounded-full font-medium hover:bg-gray-100 transition duration-300">
                    Cancel
                </a>
                <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded-full font-semibold shadow-lg shadow-blue-300/50 hover:bg-blue-700 transition duration-300 flex items-center gap-2 transform hover:scale-[1.01]">
                    <i data-lucide="save"></i> Update Post
                </button>
            </div>
        </form>
    </div>
@endsection