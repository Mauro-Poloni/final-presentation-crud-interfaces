@extends('layouts.app')

@section('title', 'Create Engineering Project')

@section('content')
    <h1 class="text-2xl font-semibold text-blue-900 mb-6 flex items-center gap-2">
        <i data-lucide="file-plus"></i> New Engineering Project
    </h1>

    <form action="{{ route('engineering_projects.store') }}" method="POST" enctype="multipart/form-data"
          class="bg-white p-6 rounded-lg shadow-md border border-gray-200 space-y-5">
        @csrf

        <div>
            <label for="project_name" class="block font-medium text-gray-700">Project Name</label>
            <input type="text" name="project_name" id="project_name"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>

        <div>
            <label for="status" class="block font-medium text-gray-700">Status</label>
            <select name="status" id="status"
                    class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
                <option value="planned">Planned</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>
        </div>

        <div>
            <label for="lead_engineer" class="block font-medium text-gray-700">Lead Engineer</label>
            <input type="text" name="lead_engineer" id="lead_engineer"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500"
                   required>
        </div>

        <div>
            <label for="description" class="block font-medium text-gray-700">Project Description</label>
            <textarea name="description" id="description" rows="4"
                      class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500"
                      placeholder="Describe the project's purpose, goals, and requirements..."></textarea>
        </div>

        <div>
            <label for="diagram" class="block font-medium text-gray-700">Diagram / Blueprint</label>
            <input type="file" name="diagram" id="diagram"
                   class="mt-1 p-2 w-full border-gray-300 rounded-md focus:ring-blue-500 focus:border-blue-500">
        </div>

        <div class="flex justify-end gap-3">
            <a href="{{ route('engineering_projects.index') }}" class="px-4 py-2 bg-gray-300 rounded-lg hover:bg-gray-400">Cancel</a>
            <button type="submit" class="bg-blue-700 hover:bg-blue-800 text-white px-5 py-2 rounded-md shadow-md flex items-center gap-2">
                <i data-lucide="save"></i> Save Project
            </button>
        </div>
    </form>
@endsection
