<?php

namespace App\Http\Controllers;

use App\Http\Middleware\AdminMiddleware;
use App\Http\Requests\CourseRequest;
use App\Models\Course;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CourseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
        $this->middleware(AdminMiddleware::class)->only(['create', 'store', 'edit', 'update', 'destroy']);
    }

    public function index(): View
    {
        $courses = Course::latest()->paginate(15);

        return view('courses.index', compact('courses'));
    }

    public function create(): View
    {
        return view('courses.create');
    }

    public function store(CourseRequest $request): RedirectResponse
    {
        Course::create($request->validated());

        return redirect()->route('courses.index')->with('success', 'Course created.');
    }

    public function show(Course $course): View
    {
        $enrolled = auth()->check() ? auth()->user()->courses()->wherePivot('course_id', $course->id)->exists() : false;

        return view('courses.show', compact('course', 'enrolled'));
    }

    public function edit(Course $course): View
    {
        return view('courses.edit', compact('course'));
    }

    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        $course->update($request->validated());

        return redirect()->route('courses.index')->with('success', 'Course updated.');
    }

    public function destroy(Course $course): RedirectResponse
    {
        $course->delete();

        return redirect()->route('courses.index')->with('success', 'Course deleted.');
    }

    public function enroll(Request $request, Course $course): RedirectResponse
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        if ($course->users()->count() >= $course->max_students) {
            return back()->withErrors(['course' => 'This course is full.']);
        }

        $user->courses()->syncWithoutDetaching([$course->id]);

        return back()->with('success', 'Enrolled in course.');
    }

    public function unenroll(Request $request, Course $course): RedirectResponse
    {
        $user = $request->user();

        if (! $user) {
            return redirect()->route('login');
        }

        $user->courses()->detach($course->id);

        return back()->with('success', 'Unenrolled from course.');
    }
}
