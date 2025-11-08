@extends('layouts.app')

@section('title', 'Social Feed')

@section('content')
    <div class="mb-12 md:mb-16">
        <img class="w-full aspect-[4/1] object-cover object-center" src="{{ asset('storage/social_images/assets/social_posts_banner.png') }}">
    </div>
    <div class="max-w-3xl mx-auto">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-semibold text-blue-800 flex items-center gap-2">
                <i data-lucide="message-circle"></i> Social Feed
            </h1>
            <a href="{{ route('social_posts.create') }}"
               class="bg-blue-600 text-white px-4 py-2 rounded-full shadow hover:bg-blue-700 flex items-center gap-2">
                <i data-lucide="plus-circle"></i> New Post
            </a>
        </div>

        {{-- Feed style cards --}}
        @forelse($social_posts as $post)
            <div class="bg-white rounded-2xl shadow-md mb-6 p-4 border border-gray-200">
                <div class="flex items-center gap-3 mb-3">
                    <div class="bg-blue-500 text-white w-10 h-10 flex items-center justify-center rounded-full text-lg font-bold">
                        {{ strtoupper(substr($post->username, 0, 1)) }}
                    </div>
                    <div>
                        <p class="font-semibold text-gray-800">{{ $post->username }}</p>
                        <p class="text-xs text-gray-400">{{ ucfirst($post->visibility) }} • {{ $post->created_at->diffForHumans() }}</p>
                    </div>
                </div>

                @if($post->content)
                    <p class="text-gray-700 mb-3 whitespace-pre-line">{{ $post->content }}</p>
                @endif

                @if($post->image_path)
                    <img src="{{ asset('storage/'.$post->image_path) }}"
                         class="rounded-lg mb-3 max-h-80 object-cover w-full">
                @endif

                <div class="flex justify-between text-sm text-gray-500">
                    <div class="flex items-center gap-2">
                        <i data-lucide="heart" class="w-4 h-4 text-red-400"></i>
                        <span>{{ $post->likes }} likes</span>
                    </div>
                    <div class="flex gap-4">
                        <a href="{{ route('social_posts.show', $post) }}" class="text-blue-500 hover:underline">View</a>
                        <a href="{{ route('social_posts.edit', $post) }}" class="text-green-500 hover:underline">Edit</a>
                        <form action="{{ route('social_posts.destroy', $post) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        @empty
            <p class="text-center text-gray-500">No posts yet.</p>
        @endforelse

        {{-- Mini summary table --}}
        <div class="mt-10 bg-white shadow-md rounded-lg overflow-hidden border border-gray-200">
            <table class="min-w-full text-sm">
                <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="py-2 px-3 text-left">#</th>
                    <th class="py-2 px-3 text-left">Username</th>
                    <th class="py-2 px-3 text-left">Visibility</th>
                    <th class="py-2 px-3 text-center">Likes</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                @foreach($social_posts as $post)
                    <tr class="hover:bg-gray-50">
                        <td class="py-2 px-3">{{ $post->id }}</td>
                        <td class="py-2 px-3">{{ $post->username }}</td>
                        <td class="py-2 px-3 capitalize">{{ $post->visibility }}</td>
                        <td class="py-2 px-3 text-center">{{ $post->likes }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div class="mt-6 p-6">
                {{ $social_posts->links() }}
            </div>
        </div>
    </div>
@endsection
