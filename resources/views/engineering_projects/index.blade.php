@extends('layouts.app')

@section('title', 'Engineering Projects')

@section('content')
    <div class="mb-12 md:mb-16">
        <img class="w-full aspect-[4/1] object-cover object-center" src="{{ asset('storage/engineering_diagrams/assets/engineering_projects_banner.png') }}">
    </div>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-semibold text-blue-900 flex items-center gap-2">
            <i data-lucide="settings"></i> Engineering Projects
        </h1>
        <a href="{{ route('engineering_projects.create') }}"
           class="bg-blue-700 hover:bg-blue-800 text-white px-4 py-2 rounded-lg flex items-center gap-2 shadow-md">
            <i data-lucide="plus-circle"></i> New Project
        </a>
    </div>

    <table class="w-full text-left border border-gray-200 shadow-sm bg-white rounded-lg">
        <thead class="bg-gray-100 text-gray-700 uppercase text-sm">
        <tr>
            <th class="py-3 px-4">#</th>
            <th class="py-3 px-4">Project Name</th>
            <th class="py-3 px-4">Status</th>
            <th class="py-3 px-4">Lead Engineer</th>
            <th class="py-3 px-4">Diagram</th>
            <th class="py-3 px-4 text-center">Actions</th>
        </tr>
        </thead>
        <tbody class="divide-y divide-gray-100">
        @forelse($engineering_projects as $project)
            <tr class="hover:bg-gray-50">
                <td class="py-3 px-4">{{ $project->id }}</td>
                <td class="py-3 px-4 font-medium text-blue-900">{{ $project->project_name }}</td>
                <td class="py-3 px-4">
                <span class="px-2 py-1 rounded text-xs font-semibold
                    @if($project->status == 'planned') bg-yellow-100 text-yellow-800
                    @elseif($project->status == 'in_progress') bg-blue-100 text-blue-800
                    @else bg-green-100 text-green-800 @endif">
                    {{ ucfirst($project->status) }}
                </span>
                </td>
                <td class="py-3 px-4">{{ $project->lead_engineer }}</td>
                <td class="py-3 px-4">
                    @if($project->diagram_path)
                        <img src="{{ asset('storage/' . $project->diagram_path) }}" alt="diagram"
                             class="w-14 h-14 object-cover rounded shadow-sm">
                    @else
                        <span class="text-gray-400 italic">No image</span>
                    @endif
                </td>
                <td class="py-3 px-4 flex justify-center gap-3">
                    <a href="{{ route('engineering_projects.show', $project) }}" class="text-blue-600 hover:text-blue-800">
                        <i data-lucide="eye"></i>
                    </a>
                    <a href="{{ route('engineering_projects.edit', $project) }}" class="text-yellow-500 hover:text-yellow-700">
                        <i data-lucide="edit"></i>
                    </a>
                    <form action="{{ route('engineering_projects.destroy', $project) }}" method="POST" class="inline delete-form">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="text-red-600 hover:text-red-800">
                            <i data-lucide="trash-2"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="6" class="py-4 text-center text-gray-500 italic">No projects found.</td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="mt-6">
        {{ $engineering_projects->links() }}
    </div>
@endsection
