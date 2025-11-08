@extends('layouts.app')

@section('title', 'View Post')

@section('content')
    <div class="max-w-2xl mx-auto bg-white rounded-xl shadow-2xl p-8 border border-gray-100">

        <div class="flex justify-between items-start mb-6 border-b pb-4">
            <div class="flex items-center gap-4">
                <div class="bg-blue-500 text-white w-14 h-14 flex items-center justify-center rounded-full text-xl font-bold border-2 border-white shadow-lg flex-shrink-0">
                    {{ strtoupper(substr($social_post->username, 0, 1)) }}
                </div>
                <div>
                    <h2 class="text-2xl font-bold text-gray-900">{{ $social_post->username }}</h2>
                    <p class="text-sm text-gray-500 mt-0.5">
                        <i data-lucide="clock" class="w-3.5 h-3.5 inline mr-1 -mt-0.5"></i> {{ $social_post->created_at->diffForHumans() }}
                        <span class="ml-3 px-2 py-0.5 rounded-full text-xs font-medium capitalize
                            @if($social_post->visibility == 'public') bg-green-100 text-green-800
                            @elseif($social_post->visibility == 'private') bg-red-100 text-red-800
                            @else bg-yellow-100 text-yellow-800 @endif">
                            {{ $social_post->visibility }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        @if($social_post->content)
            <p class="text-gray-800 text-lg mb-6 whitespace-pre-line">{{ $social_post->content }}</p>
        @endif

        @if($social_post->image_path)
            <img src="{{ asset('storage/'.$social_post->image_path) }}" class="rounded-xl mb-6 w-full max-h-[500px] object-cover shadow-md border border-gray-100">
        @endif

        <div class="flex items-center gap-8 py-3 px-1 border-t border-b border-gray-100 mb-6">
            <div class="flex items-center gap-2 text-red-500 font-bold text-lg">
                <i data-lucide="heart" class="w-6 h-6 fill-red-400"></i>
                <span>{{ $social_post->likes }} Likes</span>
            </div>
            <div class="flex items-center gap-2 text-gray-500 font-semibold text-lg hover:text-gray-700 transition">
                <i data-lucide="message-circle" class="w-6 h-6"></i>
                <span>3 Comments</span>
            </div>
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('social_posts.index') }}" class="px-5 py-2 text-gray-600 rounded-full font-medium hover:bg-gray-100 transition duration-300 flex items-center gap-2">
                <i data-lucide="arrow-left" class="w-5 h-5"></i> Back to Feed
            </a>
            <a href="{{ route('social_posts.edit', $social_post) }}"
               class="bg-blue-600 text-white px-6 py-2 rounded-full font-semibold shadow-lg shadow-blue-300/50 hover:bg-blue-700 transition duration-300 flex items-center gap-2 transform hover:scale-[1.01]">
                <i data-lucide="edit"></i> Edit Post
            </a>
        </div>
    </div>
@endsection