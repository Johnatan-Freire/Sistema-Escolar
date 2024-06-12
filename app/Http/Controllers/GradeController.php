<?php

namespace App\Http\Controllers;

use App\Models\Grade;
use Illuminate\Http\Request;

class GradeController extends Controller
{
    public function index()
    {
        $grades = Grade::with(['student', 'module'])->get();
        return view('admin.grade', ['grades' => $grades]);
    }

    public function show($id)
    {
        $grade = Grade::with(['student', 'module'])->findOrFail($id);
        return view('admin.grade_show', ['grade' => $grade]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'module_id' => 'required|exists:modules,id',
            'nota' => 'required|numeric',
        ]);

        $grade = Grade::create($request->all());
        return redirect()->route('grades.index')->with('success', 'Nota criada com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'module_id' => 'required|exists:modules,id',
            'nota' => 'required|numeric',
        ]);

        $grade = Grade::findOrFail($id);
        $grade->update($request->all());
        return redirect()->route('grades.index')->with('success', 'Nota atualizada com sucesso.');
    }

    public function destroy($id)
    {
        $grade = Grade::findOrFail($id);
        $grade->delete();
        return redirect()->route('grades.index')->with('success', 'Nota deletada com sucesso.');
    }
}
