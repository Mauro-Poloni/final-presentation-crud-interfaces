@extends('layouts.app')

@section('title', 'Edit Post')

@section('content')
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6 border-t-4 border-green-600">
        <h2 class="text-2xl font-semibold text-green-700 mb-4 flex items-center gap-2">
            <i data-lucide="edit-3"></i> Edit Post
        </h2>

        <form action="{{ route('social_posts.update', $social_post) }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf
            @method('PUT')

            <div>
                <label class="block font-medium text-gray-700">Username</label>
                <input type="text" name="username" value="{{ $social_post->username }}" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Visibility</label>
                <select name="visibility" class="w-full border-gray-300 rounded-lg p-2 bg-white">
                    @foreach(['public','friends','private'] as $option)
                        <option value="{{ $option }}" {{ $social_post->visibility == $option ? 'selected' : '' }}>
                            {{ ucfirst($option) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Content</label>
                <textarea name="content" rows="3" class="w-full border-gray-300 rounded-lg p-2">{{ $social_post->content }}</textarea>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Current Image</label>
                @if($social_post->image_path)
                    <img src="{{ asset('storage/'.$social_post->image_path) }}" class="rounded-lg w-full max-h-64 object-cover mb-2">
                @else
                    <p class="text-sm text-gray-500">No image uploaded.</p>
                @endif
                <input type="file" name="image" class="w-full border-gray-300 rounded-lg p-2 bg-white">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('social_posts.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center gap-2">
                    <i data-lucide="save"></i> Update
                </button>
            </div>
        </form>
    </div>
@endsection
