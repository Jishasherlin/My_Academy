<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::all();
        return view('course.index', compact('courses'));
    }

    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'instructor' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:100',
            'level' => 'required|string|max:50',
            'syllabus' => 'required|string',
        ]);

        Course::create([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'price' => $request->price,
            'category' => $request->category,
            'level' => $request->level,
            'syllabus' => $request->syllabus,
        ]);

        return redirect()->route('course.index')->with('success', 'Course added!');
    }

    public function edit(Course $course)
    {
        return view('course.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'instructor' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category' => 'required|string|max:100',    
            'level' => 'required|string|max:50',
            'syllabus' => 'required|string',
        ]);
        $course->update([
            'title' => $request->title,
            'description' => $request->description,
            'duration' => $request->duration,
            'instructor' => $request->instructor,
            'price' => $request->price,
            'category' => $request->category,
            'level' => $request->level,
            'syllabus' => $request->syllabus,
        ]);

        return redirect()->route('course.index')->with('success', 'Course updated!');
    }
public  function enroll(Course $course)
    {
        $user = auth()->user();

        // Create an enquiry record
        \App\Models\enquiry::create([
            'user_id' => $user->id,
            'course_id' => $course->id,
        ]);

    return redirect()->route('course.show', $course)->with('success', 'Enquiry sent successfully!');
    }
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('course.index')->with('success', 'Course deleted!');
    }
    public function show(Course $course)
    {
        return view('course.show', compact('course'));
    }
}
