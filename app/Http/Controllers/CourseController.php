<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('modules')->get();
        return view('admin.course', ['courses' => $courses]);
    }

    public function show($id)
    {
        $course = Course::with('modules')->findOrFail($id);
        return view('admin.course_show', ['course' => $course]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'carga_horaria' => 'required',
            'dias' => 'required',
            'turno' => 'required',
            'preco' => 'required|numeric',
        ]);

        $course = Course::create($request->all());
        return redirect()->route('courses.index')->with('success', 'Course created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'carga_horaria' => 'required',
            'dias' => 'required',
            'turno' => 'required',
            'preco' => 'required|numeric',
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->all());
        return redirect()->route('courses.index')->with('success', 'Course updated successfully.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Course deleted successfully.');
    }
}
