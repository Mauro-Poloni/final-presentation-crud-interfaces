@extends('layouts.app')

@section('title', 'Engineering Projects')

@section('content')

    <div class="mb-8">
        <img class="w-full aspect-[4/1] object-cover object-center rounded-xl shadow-xl border-4 border-gray-200"
             src="{{ asset('storage/engineering_diagrams/assets/engineering_projects_banner.png') }}"
             alt="Engineering Projects Professional Banner">
    </div>

    <div class="bg-white shadow-2xl rounded-xl p-8 border-t-8 border-blue-900">

        <div class="flex justify-between items-center mb-8 border-b border-gray-200 pb-4">
            <h1 class="text-3xl font-extrabold text-blue-900 flex items-center gap-3">
                <i data-lucide="cog" class="w-8 h-8 text-blue-600"></i> Project Management Dashboard
            </h1>

            <a href="{{ route('engineering_projects.create') }}"
               class="bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-blue-800 transition duration-300 flex items-center gap-2 transform hover:scale-[1.02]">
                <i data-lucide="plus-circle"></i> New Project
            </a>
        </div>

        <div class="grid grid-cols-3 gap-6 mb-8 text-center">
            <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-blue-600 shadow-sm">
                <p class="text-xs font-medium text-gray-500 uppercase">Total Projects</p>
                <p class="text-2xl font-bold text-blue-900 mt-1">15</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-yellow-600 shadow-sm">
                <p class="text-xs font-medium text-gray-500 uppercase">Planned</p>
                <p class="text-2xl font-bold text-yellow-800 mt-1">4</p>
            </div>
            <div class="p-4 bg-gray-50 rounded-lg border-l-4 border-green-600 shadow-sm">
                <p class="text-xs font-medium text-gray-500 uppercase">Completed</p>
                <p class="text-2xl font-bold text-green-700 mt-1">7</p>
            </div>
        </div>

        <h2 class="text-2xl font-semibold text-blue-900 mb-5 border-b pb-3">Active Projects Grid</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @forelse($engineering_projects as $project)
                @php
                    $status_color = 'gray';
                    if ($project->status == 'planned') { $status_color = 'yellow'; }
                    elseif ($project->status == 'in_progress') { $status_color = 'blue'; }
                    elseif ($project->status == 'completed') { $status_color = 'green'; }
                @endphp


                <div class="bg-white rounded-xl shadow-lg border-t-4 border-{{ $status_color }}-600 p-5 transform hover:shadow-xl transition duration-300">

                    <div class="flex justify-between items-start mb-4">
                        <h3 class="text-xl font-bold text-blue-900 pr-4">{{ $project->project_name }}</h3>
                        @if($project->diagram_path)
                            <img src="{{ asset('storage/' . $project->diagram_path) }}"
                                 alt="diagram"
                                 class="w-16 h-16 object-cover rounded-md shadow-inner border border-gray-200 flex-shrink-0">
                        @else
                            <div class="w-16 h-16 rounded-md bg-gray-100 flex items-center justify-center text-gray-400 border border-dashed border-gray-300">
                                <i data-lucide="image-off" class="w-6 h-6"></i>
                            </div>
                        @endif
                    </div>

                    <div class="flex justify-between items-center text-sm mb-4">
                        <div>
                            <p class="text-xs font-medium text-gray-500 uppercase">Lead Engineer</p>
                            <p class="font-semibold text-gray-700 flex items-center gap-1">
                                <i data-lucide="user" class="w-4 h-4 text-blue-600"></i> {{ $project->lead_engineer }}
                            </p>
                        </div>
                        <span class="px-3 py-1 rounded-full text-xs font-bold text-white uppercase bg-{{ $status_color }}-600 shadow-md">
                            {{ ucfirst(str_replace('_', ' ', $project->status)) }}
                        </span>
                    </div>

                    <div class="flex justify-end gap-3 pt-3 border-t border-gray-100">
                        <a href="{{ route('engineering_projects.show', $project) }}" class="text-blue-600 hover:text-blue-800 p-1 rounded hover:bg-blue-50 transition" title="View">
                            <i data-lucide="eye" class="w-5 h-5"></i>
                        </a>
                        <a href="{{ route('engineering_projects.edit', $project) }}" class="text-yellow-600 hover:text-yellow-800 p-1 rounded hover:bg-yellow-50 transition" title="Edit">
                            <i data-lucide="edit" class="w-5 h-5"></i>
                        </a>
                        <form action="{{ route('engineering_projects.destroy', $project) }}" method="POST" class="inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 p-1 rounded hover:bg-red-50 transition" title="Delete">
                                <i data-lucide="trash-2" class="w-5 h-5"></i>
                            </button>
                        </form>
                    </div>

                </div>
            @empty
                <div class="col-span-full text-center p-10 bg-gray-50 rounded-xl text-gray-500 italic border-4 border-dashed border-gray-300">
                    <i data-lucide="folder-open" class="w-12 h-12 mx-auto mb-3"></i>
                    <p class="font-semibold text-lg">No engineering projects are currently registered.</p>
                </div>
            @endforelse
        </div>

        <h2 class="text-2xl font-semibold text-blue-900 mt-10 mb-5 border-t pt-6">Technical Project Register</h2>
        <table class="w-full text-left border border-gray-200 shadow-lg bg-gray-50 rounded-lg overflow-hidden">
            <thead class="bg-blue-900 text-white uppercase text-xs">
            <tr>
                <th class="py-3 px-4">ID</th>
                <th class="py-3 px-4">Project Name</th>
                <th class="py-3 px-4">Status</th>
                <th class="py-3 px-4">Engineer</th>
            </tr>
            </thead>
            <tbody class="divide-y divide-gray-200 bg-white">
            @foreach($engineering_projects as $project)
                <tr class="hover:bg-blue-50 transition">
                    <td class="py-3 px-4 font-bold text-blue-700">{{ $project->id }}</td>
                    <td class="py-3 px-4 font-medium text-gray-800">{{ $project->project_name }}</td>
                    <td class="py-3 px-4">
                        <span class="px-2 py-1 rounded text-xs font-semibold
                            @if($project->status == 'planned') bg-yellow-100 text-yellow-800
                            @elseif($project->status == 'in_progress') bg-blue-100 text-blue-800
                            @else bg-green-100 text-green-800 @endif">
                            {{ ucfirst($project->status) }}
                        </span>
                    </td>
                    <td class="py-3 px-4 text-sm">{{ $project->lead_engineer }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-8 flex justify-center">
            {{ $engineering_projects->links() }}
        </div>
    </div>
@endsection