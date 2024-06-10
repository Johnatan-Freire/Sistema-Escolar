<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $query = Student::query();

        if ($request->filled('situacao')) {
            $situacoes = $request->input('situacao');
            $query->whereIn('situacao_cadastral', $situacoes);
        }

        if ($request->filled('search')) {
            $searchOption = $request->input('searchOption', 'Nome');
            $searchTerm = '%' . $request->search . '%';

            switch ($searchOption) {
                case 'Matricula':
                    $query->where('id', 'like', $searchTerm);
                    break;
                case 'CPF':
                    $query->where('cpf', 'like', $searchTerm);
                    break;
                case 'Responsavel':
                    $query->where('responsavel', 'like', $searchTerm);
                    break;
                default:
                    $query->where('nome', 'like', $searchTerm);
            }
        }

        $students = $query->get();

        if ($request->ajax()) {
            return response()->json(['students' => $students]);
        }

        return view('admin.student', [
            'students' => $students,
            'search' => $request->search,
            'searchOption' => $request->input('searchOption', 'Nome'),
            'situacao' => $request->input('situacao', [])
        ]);
    }

    public function show($id)
    {
        $student = Student::with('grades.module')->findOrFail($id);
        return view('admin.student_show', ['student' => $student]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
        ]);

        $student = Student::create($request->all());
        return redirect()->route('students.index')->with('success', 'Student created successfully.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required',
            'cpf' => 'required',
        ]);

        $student = Student::findOrFail($id);
        $student->update($request->all());
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
    }
}
