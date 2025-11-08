@extends('layouts.app')

@section('title', 'Project Details')

@section('content')
    <div class="bg-white shadow-md rounded-lg p-6 border border-gray-200">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-semibold text-blue-900 flex items-center gap-2">
                <i data-lucide="file-text"></i> {{ $engineering_project->project_name }}
            </h1>
            <a href="{{ route('engineering_projects.index') }}"
               class="bg-gray-200 hover:bg-gray-300 text-gray-800 px-4 py-2 rounded-lg flex items-center gap-2">
                <i data-lucide="arrow-left"></i> Back
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <p><strong>Status:</strong>
                    <span class="px-2 py-1 rounded text-sm font-semibold
                    @if($engineering_project->status == 'planned') bg-yellow-100 text-yellow-800
                    @elseif($engineering_project->status == 'in_progress') bg-blue-100 text-blue-800
                    @else bg-green-100 text-green-800 @endif">
                    {{ ucfirst($engineering_project->status) }}
                </span>
                </p>
                <p class="mt-2"><strong>Lead Engineer:</strong> {{ $engineering_project->lead_engineer }}</p>
                <p class="mt-4 text-gray-700"><strong>Description:</strong></p>
                <p class="mt-1 text-gray-600">{{ $engineering_project->description ?: 'No description provided.' }}</p>
            </div>

            <div>
                @if($engineering_project->diagram_path)
                    <img src="{{ asset('storage/' . $engineering_project->diagram_path) }}" alt="diagram"
                         class="w-full h-64 object-contain border rounded-lg shadow-sm">
                @else
                    <p class="text-gray-400 italic">No diagram available.</p>
                @endif
            </div>
        </div>
    </div>
@endsection
