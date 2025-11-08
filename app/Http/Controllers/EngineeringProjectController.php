<?php

namespace App\Http\Controllers;

use App\Models\EngineeringProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EngineeringProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $engineering_projects = EngineeringProject::orderBy('created_at', 'desc')->paginate(6);
        return view('engineering_projects.index', compact('engineering_projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('engineering_projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'project_name'  => 'required|string|max:150',
            'status'        => 'required|in:planned,in_progress,completed',
            'description'   => 'nullable|string|max:2000',
            'diagram'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'lead_engineer' => 'required|string|max:100',
        ]);

        if ($request->hasFile('diagram')) {
            $validated['diagram_path'] = $request->file('diagram')->store('engineering_diagrams', 'public');
        }

        EngineeringProject::create($validated);

        session()->flash('success', 'Engineering project created successfully.');
        return redirect()->route('engineering_projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(EngineeringProject $engineering_project)
    {
        return view('engineering_projects.show', compact('engineering_project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(EngineeringProject $engineering_project)
    {
        return view('engineering_projects.edit', compact('engineering_project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, EngineeringProject $engineering_project)
    {
        $validated = $request->validate([
            'project_name'  => 'required|string|max:150',
            'status'        => 'required|in:planned,in_progress,completed',
            'description'   => 'nullable|string|max:2000',
            'diagram'       => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'lead_engineer' => 'required|string|max:100',
        ]);

        if ($request->hasFile('diagram')) {
            // eliminar diagrama anterior si existe
            if ($engineering_project->diagram_path && Storage::disk('public')->exists($engineering_project->diagram_path)) {
                Storage::disk('public')->delete($engineering_project->diagram_path);
            }

            $validated['diagram_path'] = $request->file('diagram')->store('engineering_diagrams', 'public');
        }

        $engineering_project->update($validated);

        session()->flash('success', 'Engineering project updated successfully.');
        return redirect()->route('engineering_projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(EngineeringProject $engineering_project)
    {
        if ($engineering_project->diagram_path && Storage::disk('public')->exists($engineering_project->diagram_path)) {
            Storage::disk('public')->delete($engineering_project->diagram_path);
        }

        $engineering_project->delete();

        session()->flash('success', 'Project deleted successfully.');
        return redirect()->route('engineering_projects.index');
    }
}
