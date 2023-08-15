<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course; // Import model Course

class CourseController extends Controller
{
    // Menampilkan daftar Course
    public function index()
    {
        $courses = Course::all();
        return view('admin.courses.index', compact('courses'));
    }

    // Menampilkan form untuk membuat Course baru
    public function create()
    {
        return view('admin.courses.create');
    }

    // Menyimpan Course baru ke database
    public function store(Request $request)
    {
        Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created successfully');
    }

    // Menampilkan detail Course
    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));

    }

    // Menampilkan form untuk mengedit Course
    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    // Update Course di database
    public function update(Request $request, Course $course)
    {
        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully');
    }

    // Menghapus Course dari database
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully');
    }

    public function showDetail($id)
{
    $course = Course::findOrFail($id);
    return view('course.detail', compact('course'));
}

}

