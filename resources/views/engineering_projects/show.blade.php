@extends('layouts.app')

@section('title', 'Project Details')

@section('content')

    <div class="max-w-4xl mx-auto bg-white shadow-2xl rounded-xl p-8 border-t-8 border-blue-900">

        <div class="flex justify-between items-start mb-8 border-b border-gray-200 pb-4">
            <h1 class="text-3xl font-extrabold text-blue-900 flex items-center gap-3">
                <i data-lucide="server" class="w-7 h-7 text-blue-600"></i> {{ $engineering_project->project_name }}
            </h1>
            <div class="flex gap-3">
                <a href="{{ route('engineering_projects.edit', $engineering_project) }}"
                   class="bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-blue-800 transition duration-150 flex items-center gap-2">
                    <i data-lucide="edit"></i> Edit Project
                </a>
                <a href="{{ route('engineering_projects.index') }}"
                   class="bg-gray-300 text-gray-700 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-400 transition duration-150 flex items-center gap-2">
                    <i data-lucide="arrow-left"></i> Back
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            <div class="lg:col-span-1 space-y-5">

                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-sm">
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1">Current Status</p>
                    @php
                        $status_color_class = [
                            'planned' => 'bg-yellow-100 text-yellow-800',
                            'in_progress' => 'bg-blue-100 text-blue-800',
                            'completed' => 'bg-green-100 text-green-800',
                        ][$engineering_project->status] ?? 'bg-gray-100 text-gray-800';
                    @endphp
                    <span class="text-xl font-bold {{ $status_color_class }} px-3 py-1 rounded-full capitalize">
                        {{ ucfirst(str_replace('_', ' ', $engineering_project->status)) }}
                    </span>
                </div>

                <div class="p-4 bg-gray-50 rounded-lg border border-gray-200 shadow-sm">
                    <p class="text-xs font-medium text-gray-500 uppercase mb-1">Lead Engineer</p>
                    <p class="text-xl font-bold text-blue-700 flex items-center gap-2">
                        <i data-lucide="user-check" class="w-6 h-6"></i> {{ $engineering_project->lead_engineer }}
                    </p>
                </div>

                <div class="space-y-3 pt-3 border-t border-gray-200">
                    <div>
                        <p class="font-medium text-gray-600 flex items-center gap-2"><i data-lucide="calendar" class="w-4 h-4 text-gray-500"></i> Project ID:</p>
                        <p class="font-bold text-gray-800">{{ $engineering_project->id }}</p>
                    </div>
                    <div>
                        <p class="font-medium text-gray-600 flex items-center gap-2"><i data-lucide="clock" class="w-4 h-4 text-gray-500"></i> Date Created:</p>
                        <p class="font-bold text-gray-800">{{ $engineering_project->created_at->format('d/m/Y H:i') }}</p>
                    </div>
                </div>
            </div>

            <div class="lg:col-span-2 space-y-6">

                <div class="p-4 bg-white rounded-lg border border-gray-300 shadow-inner">
                    <p class="font-semibold text-gray-700 mb-3 flex items-center gap-2 border-b pb-2"><i data-lucide="picture-in-picture" class="w-5 h-5 text-blue-600"></i> Technical Diagram</p>
                    @if($engineering_project->diagram_path)
                        <img src="{{ asset('storage/' . $engineering_project->diagram_path) }}" alt="diagram"
                             class="w-full max-h-96 object-contain rounded-lg shadow-md border border-gray-200 transition duration-500 hover:scale-[1.01] cursor-pointer">
                    @else
                        <div class="w-full h-64 flex items-center justify-center bg-gray-100 border-4 border-dashed border-gray-300 rounded-lg text-gray-500 italic">
                            <i data-lucide="image-off" class="w-10 h-10 mr-2"></i> No diagram available for this project.
                        </div>
                    @endif
                </div>

                <div class="p-4 bg-white rounded-lg border border-gray-200 shadow-sm">
                    <p class="font-semibold text-gray-700 mb-3 flex items-center gap-2 border-b pb-2"><i data-lucide="align-left" class="w-5 h-5 text-blue-600"></i> Project Description</p>
                    <p class="text-gray-700 whitespace-pre-line leading-relaxed">
                        {{ $engineering_project->description ?: 'No detailed description provided for this project.' }}
                    </p>
                </div>

            </div>
        </div>

    </div>
@endsection