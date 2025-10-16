<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
use App\Models\Publication;
use App\Models\Project;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CourseAdminController;
use App\Http\Controllers\Admin\TeamMemberController;
// use App\Models\TeamMember;
use App\Http\Controllers\Admin\PublicationController;
use App\Http\Controllers\Admin\ProjectController;







/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

// Home Page
Route::view('/', 'welcome')->name('home');

// Courses Page (Public)
Route::get('/courses', function () {
    $videoCourses = Course::whereNotNull('video_url')->get();
    $normalCourses = Course::whereNull('video_url')->get();

    return view('courses', compact('videoCourses', 'normalCourses'));
})->name('courses');

// Teams Page
// Route::get('/team', function () {
//     return view('team');
// })->name('team');
// Public Team Page
Route::get('/team', function () {
    $members = \App\Models\TeamMember::all()->groupBy('role');
    return view('team', compact('members'));
})->name('team');

//Publication Page
// Route::get('/publication', function () {
//     return view('publication');
// });


Route::get('/publication', function () {
    $publications = Publication::orderBy('year', 'desc')->get();
    return view('publication', compact('publications'));
})->name('publications');

//Projects

Route::get('/projects', function () {
    $projects = Project::orderByDesc('year')->get();
    return view('projects', compact('projects'));
})->name('projects');



/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('', function () {
            return view('auth.login');
        });
        Route::get('/courses', [CourseAdminController::class, 'index'])->name('admin.courses.index');
        Route::get('/courses/create', [CourseAdminController::class, 'create'])->name('admin.courses.create');
        Route::post('/courses', [CourseAdminController::class, 'store'])->name('admin.courses.store');
        Route::get('/courses/{course}/edit', [CourseAdminController::class, 'edit'])->name('admin.courses.edit');
        Route::post('/courses/{course}', [CourseAdminController::class, 'update'])->name('admin.courses.update');
        Route::delete('/courses/{course}', [CourseAdminController::class, 'destroy'])->name('admin.courses.destroy');

        //team member
        Route::get('/team', [TeamMemberController::class, 'index'])->name('admin.team.index');
        Route::get('/team/create', [TeamMemberController::class, 'create'])->name('admin.team.create');
        Route::post('/team', [TeamMemberController::class, 'store'])->name('admin.team.store');
        Route::get('/team/{teamMember}/edit', [TeamMemberController::class, 'edit'])->name('admin.team.edit');
        Route::put('/team/{teamMember}', [TeamMemberController::class, 'update'])->name('admin.team.update');
        Route::delete('/team/{teamMember}', [TeamMemberController::class, 'destroy'])->name('admin.team.destroy');


        //Publications
        Route::get('/publications', [PublicationController::class, 'index'])->name('admin.publications.index');
        Route::post('/publications', [PublicationController::class, 'store'])->name('admin.publications.store');

        //Projects
        // Route::get('/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
        // Route::get('/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
        // Route::post('/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
        // Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
        // Projects (Admin CRUD)
        Route::resource('projects', ProjectController::class)->names('admin.projects');




    });
});


/*
|--------------------------------------------------------------------------
| User Approval (via Email Link)
|--------------------------------------------------------------------------
*/

Route::get('/approve-user', function (Request $request) {
    $email = $request->query('email');
    $token = $request->query('token');

    // Optional security check
    if ($token !== config('app.admin_token')) {
        abort(403, 'Unauthorized access.');
    }

    $user = User::where('email', $email)->first();
    if ($user) {
        $user->is_approved = true;
        $user->save();
        return "✅ {$user->name} ({$user->role}) has been approved successfully!";
    }

    return "❌ User not found.";
});

Route::get('/reject-user', function (Request $request) {
    $email = $request->query('email');
    $token = $request->query('token');

    // Optional security check
    if ($token !== config('app.admin_token')) {
        abort(403, 'Unauthorized access.');
    }

    $user = User::where('email', $email)->first();
    if ($user) {
        $user->delete();
        return "🚫 {$user->name} ({$user->role}) has been rejected and removed.";
    }

    return "❌ User not found.";
});


/*
|--------------------------------------------------------------------------
| Authenticated User Routes
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';
