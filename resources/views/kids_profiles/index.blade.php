@extends('layouts.app')

@section('title', 'Kids Profiles')

@section('content')
    <div class="mb-12 md:mb-16">
        <img class="w-full aspect-[4/1] object-cover object-center" src="{{ asset('storage/kids_avatars/assets/kids_profile_banner.png') }}">
    </div>
    <div class="bg-white shadow-md rounded-3xl p-6 border-t-8 border-pink-400">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-pink-600 flex items-center gap-2">
                <i data-lucide="smile"></i> Kids Profiles
            </h1>
            <a href="{{ route('kids_profiles.create') }}"
               class="bg-pink-500 text-white px-4 py-2 rounded-full shadow hover:bg-pink-600 flex items-center gap-2">
                <i data-lucide="plus"></i> Add Kid
            </a>
        </div>

        <table class="min-w-full text-sm border border-gray-200 rounded-lg overflow-hidden">
            <thead class="bg-gradient-to-r from-pink-400 to-yellow-300 text-white">
            <tr>
                <th class="py-3 px-4 text-left">#</th>
                <th class="py-3 px-4 text-left">Name</th>
                <th class="py-3 px-4 text-center">Age</th>
                <th class="py-3 px-4 text-center">Favorite Color</th>
                <th class="py-3 px-4 text-center">Avatar</th>
                <th class="py-3 px-4 text-center">Actions</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-100">
            @foreach($kids_profiles as $kid)
                <tr class="hover:bg-{{ $kid->favorite_color }}-50">
                    <td class="py-3 px-4">{{ $kid->id }}</td>
                    <td class="py-3 px-4 font-semibold text-gray-700">{{ $kid->name }}</td>
                    <td class="py-3 px-4 text-center">{{ $kid->age }}</td>
                    <td class="py-3 px-4 text-center capitalize">{{ $kid->favorite_color }}</td>
                    <td class="py-3 px-4 text-center">
                        @if($kid->avatar_path)
                            <img src="{{ asset('storage/'.$kid->avatar_path) }}"
                                 class="w-10 h-10 rounded-full mx-auto border-2 border-{{ $kid->favorite_color }}-300 object-cover">
                        @else
                            <i data-lucide="image-off" class="text-gray-400 mx-auto"></i>
                        @endif
                    </td>
                    <td class="py-3 px-4 text-center">
                        <a href="{{ route('kids_profiles.show', $kid) }}" class="text-blue-500 hover:underline">View</a> |
                        <a href="{{ route('kids_profiles.edit', $kid) }}" class="text-green-500 hover:underline">Edit</a> |
                        <form action="{{ route('kids_profiles.destroy', $kid) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div class="mt-6">
            {{ $kids_profiles->links() }}
        </div>
    </div>
@endsection
