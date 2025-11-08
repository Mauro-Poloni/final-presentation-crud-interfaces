@extends('layouts.app')

@section('title', 'Edit Project')

@section('content')

    <div class="max-w-3xl mx-auto bg-white shadow-2xl rounded-xl p-8 border-t-8 border-blue-900">
        <h2 class="text-3xl font-extrabold text-blue-900 mb-8 border-b border-gray-200 pb-4 flex items-center gap-3">
            <i data-lucide="edit-3" class="w-7 h-7 text-blue-600"></i> Edit Project Details
        </h2>

        <form action="{{ route('engineering_projects.update', $engineering_project) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="project_name" class="block font-semibold text-gray-700 mb-1">Project Name</label>
                    <input type="text" name="project_name" id="project_name"
                           value="{{ old('project_name', $engineering_project->project_name) }}"
                           class="w-full border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150" required>
                </div>
                <div>
                    <label for="lead_engineer" class="block font-semibold text-gray-700 mb-1">Lead Engineer</label>
                    <input type="text" name="lead_engineer" id="lead_engineer"
                           value="{{ old('lead_engineer', $engineering_project->lead_engineer) }}"
                           class="w-full border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150" required>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="md:col-span-1">
                    <label for="status" class="block font-semibold text-gray-700 mb-1">Status</label>
                    <select name="status" id="status"
                            class="w-full border-gray-300 rounded-lg p-3 bg-white focus:ring-blue-500 focus:border-blue-500 transition duration-150">
                        <option value="planned" @selected($engineering_project->status == 'planned')>Planned</option>
                        <option value="in_progress" @selected($engineering_project->status == 'in_progress')>In Progress</option>
                        <option value="completed" @selected($engineering_project->status == 'completed')>Completed</option>
                    </select>
                </div>
                <div class="md:col-span-2">
                    <label for="description" class="block font-semibold text-gray-700 mb-1">Project Description</label>
                    <textarea name="description" id="description" rows="3"
                              class="w-full border-gray-300 rounded-lg p-3 focus:ring-blue-500 focus:border-blue-500 transition duration-150">{{ old('description', $engineering_project->description) }}</textarea>
                </div>
            </div>

            <div class="p-4 rounded-lg border border-gray-200 bg-gray-50 space-y-4">
                <p class="font-semibold text-gray-700 border-b pb-2 flex items-center gap-2"><i data-lucide="image" class="w-5 h-5 text-blue-600"></i> Diagram / Blueprint</p>
                <div class="flex items-start gap-6">
                    <div class="flex-shrink-0">
                        <label class="block text-sm font-medium text-gray-500 mb-2">Current:</label>
                        @if($engineering_project->diagram_path)
                            <img src="{{ asset('storage/' . $engineering_project->diagram_path) }}" alt="diagram"
                                 class="w-24 h-24 object-cover rounded-md shadow-md border-2 border-blue-200">
                        @else
                            <div class="w-24 h-24 rounded-md bg-gray-200 flex items-center justify-center text-gray-500 border border-dashed">
                                <i data-lucide="image-off" class="w-8 h-8"></i>
                            </div>
                        @endif
                    </div>
                    <div class="flex-grow">
                        <label for="diagram" class="block font-semibold text-gray-700 mb-1">Replace Diagram</label>
                        <input type="file" name="diagram" id="diagram"
                               class="w-full border-gray-300 rounded-lg p-3 bg-white text-gray-700 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-blue-100 file:text-blue-700 hover:file:bg-blue-200 cursor-pointer">
                    </div>
                </div>
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-gray-100">
                <a href="{{ route('engineering_projects.index') }}" class="px-5 py-2.5 bg-gray-300 text-gray-700 rounded-lg font-semibold hover:bg-gray-400 transition duration-150">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-700 text-white px-5 py-2.5 rounded-lg font-semibold shadow-md hover:bg-blue-800 transition duration-150 flex items-center gap-2 transform hover:scale-[1.01]">
                    <i data-lucide="refresh-cw"></i> Update Project
                </button>
            </div>
        </form>
    </div>
@endsection