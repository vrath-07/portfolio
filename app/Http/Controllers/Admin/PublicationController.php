<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use Illuminate\Http\Request;

class PublicationController extends Controller
{
    public function index()
    {
        $publications = Publication::orderBy('year', 'desc')->get();
        return view('admin.publications.index', compact('publications'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'publications' => 'required|array',
        ]);

        foreach ($validated['publications'] as $pub) {
            Publication::updateOrCreate(
                ['title' => $pub['title']], // avoid duplicates
                [
                    'authors' => $pub['authors'] ?? null,
                    'year' => $pub['year'] ?? null,
                    'link' => $pub['link'] ?? null,
                ]
            );
    //         $data = $request->input('publications', []);

    // // Extract all current titles
    // $titles = collect($data)->pluck('title')->toArray();

    // // Delete any publications not in the new list
    // Publication::whereNotIn('title', $titles)->delete();

    // // Update or create each one
    // foreach ($data as $pub) {
    //     Publication::updateOrCreate(
    //         ['title' => $pub['title']],
    //         [
    //             'authors' => $pub['authors'],
    //             'year' => $pub['year'],
    //             'link' => $pub['link'],
    //         ]
    //     );
        }

        return response()->json(['message' => 'Publications saved successfully!']);
    }
}
