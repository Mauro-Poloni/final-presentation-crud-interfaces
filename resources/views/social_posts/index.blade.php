@extends('layouts.app')

@section('title', 'Social Feed')

@section('content')

    <div class="max-w-3xl mx-auto">

        <div class="mb-6 rounded-xl overflow-hidden border border-gray-200 shadow-md">
            <img class="w-full aspect-[6/1] object-cover object-center"
                 src="{{ asset('storage/social_images/assets/social_posts_banner.png') }}"
                 alt="Social Feed Header Banner">
        </div>

        <div class="bg-white rounded-xl shadow-xl p-5 mb-8 border-t-4 border-blue-500">
            <div class="flex items-center gap-4">
                <div class="bg-gray-400 text-white w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold flex-shrink-0">
                    U
                </div>
                <input type="text"
                       placeholder="What's happening? Share your thoughts..."
                       class="flex-grow p-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500 text-gray-700 transition duration-150">
            </div>

            <div class="mt-4 pt-3 border-t border-gray-100 flex justify-end">
                <a href="{{ route('social_posts.create') }}"
                   class="bg-blue-600 text-white px-6 py-2 rounded-full font-semibold shadow-lg shadow-blue-300/50 hover:bg-blue-700 transition duration-300 flex items-center gap-2 transform hover:scale-[1.01]">
                    <i data-lucide="send"></i> Post Now
                </a>
            </div>
        </div>

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-extrabold text-gray-800 flex items-center gap-3">
                <i data-lucide="zap" class="w-7 h-7 text-blue-500"></i> Latest Activity
            </h1>
        </div>

        <div class="space-y-6">
            @forelse($social_posts as $post)
                <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                    <div class="p-4">
                        <div class="flex justify-between items-start mb-3">
                            <div class="flex items-center gap-3">
                                <div class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full text-xl font-bold border-2 border-white shadow-md">
                                    {{ strtoupper(substr($post->username, 0, 1)) }}
                                </div>
                                <div>
                                    <p class="font-bold text-gray-900 text-lg">{{ $post->username }}</p>
                                    <p class="text-xs text-gray-500">
                                        <i data-lucide="clock" class="w-3 h-3 inline mr-1"></i> {{ $post->created_at->diffForHumans() }}
                                        <span class="ml-2 font-semibold capitalize text-blue-500">{{ $post->visibility }}</span>
                                    </p>
                                </div>
                            </div>

                            <div x-data="{ open: false }" class="relative">
                                <button @click="open = true" class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">
                                    <i data-lucide="more-horizontal" class="w-5 h-5"></i>
                                </button>
                                <div x-show="open" @click.away="open = false"
                                     class="absolute right-0 mt-0 w-40 bg-white rounded-lg shadow-xl text-gray-800 text-sm z-20 overflow-hidden border border-gray-200">
                                    <a href="{{ route('social_posts.show', $post) }}" class="block px-4 py-2 hover:bg-gray-100">
                                        <i data-lucide="eye" class="w-4 h-4 inline mr-2"></i> View Post
                                    </a>
                                    <a href="{{ route('social_posts.edit', $post) }}" class="block px-4 py-2 hover:bg-gray-100">
                                        <i data-lucide="edit" class="w-4 h-4 inline mr-2"></i> Edit
                                    </a>
                                    <form action="{{ route('social_posts.destroy', $post) }}" method="POST" class="inline delete-form w-full">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="block px-4 py-2 hover:bg-red-50 text-red-600 w-full text-left">
                                            <i data-lucide="trash-2" class="w-4 h-4 inline mr-2"></i> Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                        @if($post->content)
                            <p class="text-gray-700 mb-4 whitespace-pre-line">{{ $post->content }}</p>
                        @endif
                    </div>

                    @if($post->image_path)
                        <img src="{{ asset('storage/'.$post->image_path) }}"
                             class="max-h-[400px] object-cover w-full">
                    @endif

                    <div class="p-4 flex justify-between items-center text-gray-500 border-t border-gray-100">
                        <div class="flex items-center gap-4">
                            <button class="flex items-center gap-1 text-red-500 hover:text-red-600 transition">
                                <i data-lucide="heart" class="w-5 h-5 fill-red-400"></i>
                                <span class="font-semibold">{{ $post->likes }}</span>
                            </button>
                            <button class="flex items-center gap-1 hover:text-gray-700 transition">
                                <i data-lucide="message-circle" class="w-5 h-5"></i>
                                <span>3 Comments</span>
                            </button>
                        </div>

                        <a href="#" class="text-sm text-blue-500 hover:text-blue-700 font-semibold">Share</a>
                    </div>
                </div>
            @empty
                <div class="text-center p-12 bg-gray-100 rounded-xl text-gray-500 italic border-4 border-dashed border-gray-300">
                    <i data-lucide="inbox" class="w-12 h-12 mx-auto mb-3"></i>
                    <p class="font-semibold text-lg">No posts in the feed yet. Be the first to post!</p>
                </div>
            @endforelse
        </div>

        <div class="mt-8">
            {{ $social_posts->links() }}
        </div>


        <h2 class="text-2xl font-semibold text-gray-800 mt-12 mb-5 border-t pt-6">Administrative Post Report</h2>
        <div class="bg-white shadow-lg rounded-xl overflow-hidden border border-gray-200">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-800 text-white uppercase text-xs">
                <tr>
                    <th class="py-3 px-4 text-left">ID</th>
                    <th class="py-3 px-4 text-left">Username</th>
                    <th class="py-3 px-4 text-left">Visibility</th>
                    <th class="py-3 px-4 text-center">Likes</th>
                    <th class="py-3 px-4 text-center">Date Posted</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 bg-white">
                @foreach($social_posts as $post)
                    <tr class="hover:bg-blue-50 transition">
                        <td class="py-2 px-4 font-bold text-gray-700">{{ $post->id }}</td>
                        <td class="py-2 px-4 font-semibold text-blue-600">{{ $post->username }}</td>
                        <td class="py-2 px-4 capitalize">
                             <span class="px-2 py-0.5 rounded-full text-xs font-medium
                                @if($post->visibility == 'public') bg-green-100 text-green-800
                                @elseif($post->visibility == 'private') bg-red-100 text-red-800
                                @else bg-yellow-100 text-yellow-800 @endif">
                                {{ $post->visibility }}
                            </span>
                        </td>
                        <td class="py-2 px-4 text-center font-bold text-red-500">{{ $post->likes }}</td>
                        <td class="py-2 px-4 text-center text-xs text-gray-500">{{ $post->created_at->format('Y-m-d H:i') }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection