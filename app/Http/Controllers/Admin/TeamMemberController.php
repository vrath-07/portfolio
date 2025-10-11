<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TeamMember;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamMemberController extends Controller
{
    public function index()
    {
        $members = TeamMember::all();
        return view('admin.team.index', compact('members'));
    }

    public function create()
    {
        return view('admin.team.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'thesis_title' => 'nullable|string',
            'area_of_research' => 'nullable|string',
            'role' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $path = $request->file('image')
            ? $request->file('image')->store('team', 'public')
            : null;

        TeamMember::create([
            'name' => $request->name,
            'status' => $request->status,
            'thesis_title' => $request->thesis_title,
            'area_of_research' => $request->area_of_research,
            'role' => $request->role,
            'image' => $path,
        ]);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member added successfully.');
    }

    public function edit(TeamMember $teamMember)
    {
        return view('admin.team.edit', compact('teamMember'));
    }

    public function update(Request $request, TeamMember $teamMember)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'status' => 'required|string',
            'thesis_title' => 'nullable|string',
            'area_of_research' => 'nullable|string',
            'role' => 'required|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only([
            'name',
            'status',
            'thesis_title',
            'area_of_research',
            'role',
        ]);

        if ($request->hasFile('image')) {
            if ($teamMember->image) {
                Storage::disk('public')->delete($teamMember->image);
            }
            $data['image'] = $request->file('image')->store('team', 'public');
        }

        $teamMember->update($data);

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member updated successfully.');
    }

    public function destroy(TeamMember $teamMember)
    {
        if ($teamMember->image) {
            Storage::disk('public')->delete($teamMember->image);
        }

        $teamMember->delete();

        return redirect()
            ->route('admin.team.index')
            ->with('success', 'Team member deleted.');
    }
}
