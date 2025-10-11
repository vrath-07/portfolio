<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseAdminController extends Controller
{
    // Show all courses
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    // Show form to add new course
    public function create()
    {
        return view('admin.courses.create');
    }

    // Save new course
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video_url' => 'nullable|url',
        ]);

        $videoUrl = $this->normalizeYoutubeUrl($request->video_url);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $videoUrl,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course added successfully!');
    }

    // Show form to edit existing course
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    // Update course
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'video_url' => 'nullable|url',
        ]);

        $videoUrl = $this->normalizeYoutubeUrl($request->video_url);

        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'video_url' => $videoUrl,
        ]);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    // Delete course
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully!');
    }

    // 🔧 Helper function to make sure URLs are embeddable
    private function normalizeYoutubeUrl($url)
    {
        if (!$url) return null;

        if (str_contains($url, 'youtu.be/')) {
            return str_replace('https://youtu.be/', 'https://www.youtube.com/embed/', $url);
        }

        if (str_contains($url, 'watch?v=')) {
            return str_replace('watch?v=', 'embed/', $url);
        }

        return $url; // already correct or not a YouTube link
    }
}
