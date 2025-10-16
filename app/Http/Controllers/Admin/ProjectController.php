<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display all projects
     */
    public function index()
    {
        $projects = Project::latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show form to create a new project
     */
    public function create()
    {
        return view('admin.projects.create');
    }

    /**
     * Store a new project in the database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'technologies' => 'nullable|string',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);

        $path = $request->hasFile('image')
            ? $request->file('image')->store('projects', 'public')
            : null;

        Project::create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'description' => $validated['description'] ?? null,
            'image' => $path,
            'link' => $validated['link'] ?? null,
            'technologies' => $validated['technologies'] ?? null,
            'year' => $validated['year'] ?? null,
        ]);

        return redirect()->route('admin.projects.index')->with('success', '✅ Project added successfully!');
    }

    /**
     * Show edit form for a project
     */
    public function edit(Project $project)
    {
        return view('admin.projects.edit', compact('project'));
    }

    /**
     * Update an existing project
     */
    public function update(Request $request, Project $project)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'link' => 'nullable|url',
            'technologies' => 'nullable|string',
            'year' => 'nullable|integer|min:1900|max:' . date('Y'),
        ]);

        // handle new image
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $validated['image'] = $request->file('image')->store('projects', 'public');
        }

        // generate new slug if title changed
        if ($validated['title'] !== $project->title) {
            $validated['slug'] = Str::slug($validated['title']);
        }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', '✅ Project updated successfully!');
    }

    /**
     * Delete a project
     */
    public function destroy(Project $project)
    {
        if ($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return back()->with('success', '🗑️ Project deleted successfully!');
    }
}
