@extends('layouts.app')

@section('title', 'View Post')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-2xl shadow-md p-6 border-t-4 border-blue-500">
        <div class="flex items-center gap-3 mb-3">
            <div class="bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full text-lg font-bold">
                {{ strtoupper(substr($social_post->username, 0, 1)) }}
            </div>
            <div>
                <h2 class="text-xl font-semibold text-gray-800">{{ $social_post->username }}</h2>
                <p class="text-sm text-gray-400">{{ ucfirst($social_post->visibility) }} • {{ $social_post->created_at->diffForHumans() }}</p>
            </div>
        </div>

        @if($social_post->content)
            <p class="text-gray-700 mb-4 whitespace-pre-line">{{ $social_post->content }}</p>
        @endif

        @if($social_post->image_path)
            <img src="{{ asset('storage/'.$social_post->image_path) }}" class="rounded-lg mb-4 w-full max-h-96 object-cover">
        @endif

        <div class="text-sm text-gray-600 flex items-center gap-2 mb-4">
            <i data-lucide="heart" class="w-5 h-5 text-red-400"></i>
            <span>{{ $social_post->likes }} likes</span>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('social_posts.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Back</a>
            <a href="{{ route('social_posts.edit', $social_post) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 flex items-center gap-2">
                <i data-lucide="edit"></i> Edit
            </a>
        </div>
    </div>
@endsection
