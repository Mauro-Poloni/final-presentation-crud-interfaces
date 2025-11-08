@extends('layouts.app')

@section('title', 'Kids Profiles')

@section('content')

    <div class="mb-12 md:mb-16">
        <img class="w-full aspect-[4/1] object-cover object-center rounded-3xl shadow-xl border-4 border-pink-300"
             src="{{ asset('storage/kids_avatars/assets/kids_profile_banner.png') }}"
             alt="Kids Profile Fun Banner">
    </div>

    <div class="bg-white shadow-2xl rounded-[3rem] p-8 border-t-[12px] border-pink-500 overflow-hidden">

        <div class="flex justify-between items-center mb-8 border-b-2 border-dashed border-yellow-300 pb-6">
            <h1 class="text-4xl font-extrabold text-pink-600 flex items-center gap-3">
                <i data-lucide="sparkles" class="w-10 h-10 text-yellow-500"></i>
                <span class="tracking-wide">Our Little Stars</span>
            </h1>

            <a href="{{ route('kids_profiles.create') }}"
               class="bg-pink-500 text-white px-6 py-3 rounded-full font-extrabold shadow-lg shadow-pink-300/50 hover:bg-pink-600 transition duration-300 flex items-center gap-2 transform hover:scale-105">
                <i data-lucide="plus"></i> Add Kid
            </a>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            @forelse($kids_profiles as $kid)
                <div class="bg-white rounded-3xl p-4 shadow-xl border-4 border-{{ $kid->favorite_color }}-400/80 text-center transform hover:scale-[1.03] transition duration-300 relative overflow-hidden">

                    <i data-lucide="star" class="absolute top-[7px] right-[7px] w-8 h-8 text-yellow-400 opacity-70"></i>

                    <div class="w-20 h-20 mx-auto mt-2 mb-4 rounded-full border-4 border-{{ $kid->favorite_color }}-600 p-0.5 bg-white shadow-inner">
                        @if($kid->avatar_path)
                            <img src="{{ asset('storage/'.$kid->avatar_path) }}" class="w-full h-full rounded-full object-cover">
                        @else
                            <i data-lucide="user-circle" class="w-full h-full text-gray-400"></i>
                        @endif
                    </div>

                    <h3 class="text-xl font-black text-pink-600 mb-1">{{ $kid->name }}</h3>

                    <div class="flex justify-center items-center gap-2 text-sm text-gray-600 mb-4">
                        <span class="font-bold text-lg text-green-500">{{ $kid->age }}</span> years old
                        <span class="w-3 h-3 rounded-full bg-{{ $kid->favorite_color }}-500 border border-gray-300 ml-2"></span>
                    </div>

                    <div class="flex justify-around items-center pt-3 border-t border-dashed border-gray-200">
                        <a href="{{ route('kids_profiles.show', $kid) }}" class="text-blue-500 hover:text-blue-700 p-1 rounded-full hover:bg-blue-50 transition" title="View Profile">
                            <i data-lucide="glasses" class="w-6 h-6"></i>
                        </a>
                        <a href="{{ route('kids_profiles.edit', $kid) }}" class="text-green-500 hover:text-green-700 p-1 rounded-full hover:bg-green-50 transition" title="Edit Profile">
                            <i data-lucide="edit" class="w-6 h-6"></i>
                        </a>
                        <form action="{{ route('kids_profiles.destroy', $kid) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 p-1 rounded-full hover:bg-red-50 transition" title="Delete Profile">
                                <i data-lucide="trash-2" class="w-6 h-6"></i>
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center p-12 bg-yellow-50 rounded-2xl text-yellow-800 italic border-4 border-dashed border-yellow-300">
                    <i data-lucide="cloud-off" class="w-12 h-12 mx-auto mb-3"></i>
                    <p class="font-semibold text-lg">Oops! No kids profiles found. Let's create the first one!</p>
                </div>
            @endforelse
        </div>

        <h2 class="text-2xl font-bold text-pink-600 mt-12 mb-5 border-t-2 border-dashed border-gray-200 pt-6">
            <i data-lucide="book-open-check" class="inline w-6 h-6 mr-2 text-pink-400"></i> Kid's Quick Roster
        </h2>
        <table class="min-w-full text-sm border-4 border-yellow-300 rounded-2xl overflow-hidden shadow-lg">
            <thead class="bg-gradient-to-r from-pink-400 to-yellow-300 text-white font-extrabold text-base">
            <tr>
                <th class="py-3 px-4 text-left">#</th>
                <th class="py-3 px-4 text-left">Name</th>
                <th class="py-3 px-4 text-center">Age</th>
                <th class="py-3 px-4 text-center">Favorite Color</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-pink-100 bg-pink-50">
            @foreach($kids_profiles as $kid)
                <tr class="hover:bg-{{ $kid->favorite_color }}-100 transition duration-150">
                    <td class="py-3 px-4 font-bold text-pink-700">{{ $kid->id }}</td>
                    <td class="py-3 px-4 font-semibold text-gray-800">{{ $kid->name }}</td>
                    <td class="py-3 px-4 text-center font-bold text-green-600">{{ $kid->age }}</td>
                    <td class="py-3 px-4 text-center capitalize">
                        <span class="inline-block w-4 h-4 rounded-full bg-{{ $kid->favorite_color }}-500 border-2 border-gray-400 mr-2"></span>
                        {{ $kid->favorite_color }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-8">
            {{ $kids_profiles->links() }}
        </div>
    </div>
@endsection