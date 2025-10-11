<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
     public function index()
    {
        $courses = Course::all();
        return view('courses', compact('courses'));
    }
}
