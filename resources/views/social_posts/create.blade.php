@extends('layouts.app')

@section('title', 'Create Post')

@section('content')
    <div class="max-w-xl mx-auto bg-white rounded-2xl shadow-md p-6 border-t-4 border-blue-600">
        <h2 class="text-2xl font-semibold text-blue-700 mb-4 flex items-center gap-2">
            <i data-lucide="edit"></i> Create New Post
        </h2>

        <form action="{{ route('social_posts.store') }}" method="POST" enctype="multipart/form-data" class="space-y-5">
            @csrf

            <div>
                <label class="block font-medium text-gray-700">Username</label>
                <input type="text" name="username" class="w-full border-gray-300 rounded-lg p-2" required>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Visibility</label>
                <select name="visibility" class="w-full border-gray-300 rounded-lg p-2 bg-white">
                    <option value="public">Public</option>
                    <option value="friends">Friends</option>
                    <option value="private">Private</option>
                </select>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Content</label>
                <textarea name="content" rows="3" placeholder="What's happening?" class="w-full border-gray-300 rounded-lg p-2"></textarea>
            </div>

            <div>
                <label class="block font-medium text-gray-700">Attach Image (optional)</label>
                <input type="file" name="image" class="w-full border-gray-300 rounded-lg p-2 bg-white">
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('social_posts.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
                    <i data-lucide="send"></i> Post
                </button>
            </div>
        </form>
    </div>
@endsection
