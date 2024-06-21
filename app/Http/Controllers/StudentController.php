<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Payment;
use App\Models\Course;
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
                    $query->where('nome_responsavel', 'like', $searchTerm);
                    break;
                default:
                    $query->where('nome', 'like', $searchTerm);
            }
        }

        $students = $query->get();

        if ($request->ajax()) {
            return response()->json(['students' => $students]);
        }

        return view('admin.student.student', [
            'students' => $students,
            'search' => $request->search,
            'searchOption' => $request->input('searchOption', 'Nome'),
            'situacao' => $request->input('situacao', [])
        ]);
    }

    public function create()
    {
        return view('admin.student.register');
    }

    public function show($id)
    {
        $student = Student::with('grades.module')->findOrFail($id);
        return view('admin.student_show', ['student' => $student]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'date_birth' => 'required|date',
            'responsible_name' => 'nullable|string|max:255',
            'responsible_cpf' => 'nullable|string|max:14',
            'responsible_date_birth' => 'nullable|date',
            'phone' => 'required|string|max:15',
            'phone2' => 'nullable|string|max:15',
            'zip' => 'required|string|max:9',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'neighborhood' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'notes' => 'nullable|string',
            'course_id' => 'required|exists:courses,id', // Adicionando validação para curso
        ]);

        $endereco = $request->input('street') . ', ' . $request->input('house_number') . ', ' . $request->input('neighborhood') . ', ' . $request->input('city') . ' - ' . $request->input('state') . ', ' . $request->input('zip');

        $student = Student::create([
            'nome' => $request->input('name'),
            'cpf' => $request->input('cpf'),
            'data_nascimento' => $request->input('date_birth'),
            'nome_responsavel' => $request->input('responsible_name'),
            'cpf_responsavel' => $request->input('responsible_cpf'),
            'data_nascimento_responsavel' => $request->input('responsible_date_birth'),
            'fone' => $request->input('phone'),
            'fone2' => $request->input('phone2'),
            'cep' => $request->input('zip'),
            'endereco' => $endereco,
            'observacao' => $request->input('notes'),
        ]);

        $course = Course::findOrFail($request->input('course_id'));
        $student->addCourse($course);

        return redirect()->route('students.index')->with('success', 'Aluno criado com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'cpf' => 'required|string|max:14',
            'date_birth' => 'required|date',
            'responsible_name' => 'nullable|string|max:255',
            'responsible_cpf' => 'nullable|string|max:14',
            'responsible_date_birth' => 'nullable|date',
            'phone' => 'required|string|max:15',
            'phone2' => 'nullable|string|max:15',
            'zip' => 'required|string|max:9',
            'city' => 'required|string|max:255',
            'state' => 'required|string|max:2',
            'neighborhood' => 'required|string|max:255',
            'street' => 'required|string|max:255',
            'house_number' => 'required|string|max:255',
            'notes' => 'nullable|string',
        ]);

        $endereco = $request->input('street') . ', ' . $request->input('house_number') . ', ' . $request->input('neighborhood') . ', ' . $request->input('city') . ' - ' . $request->input('state') . ', ' . $request->input('zip');

        $student = Student::findOrFail($id);
        $student->update([
            'nome' => $request->input('name'),
            'cpf' => $request->input('cpf'),
            'data_nascimento' => $request->input('date_birth'),
            'nome_responsavel' => $request->input('responsible_name'),
            'cpf_responsavel' => $request->input('responsible_cpf'),
            'data_nascimento_responsavel' => $request->input('responsible_date_birth'),
            'fone' => $request->input('phone'),
            'fone2' => $request->input('phone2'),
            'cep' => $request->input('zip'),
            'endereco' => $endereco,
            'observacao' => $request->input('notes'),
        ]);

        return redirect()->route('students.index')->with('success', 'Aluno atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Aluno deletado com sucesso.');
    }

    public function addCourseToStudent(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::findOrFail($id);
        $course = Course::findOrFail($request->input('course_id'));
        $student->addCourse($course);

        return redirect()->route('students.show', $id)->with('success', 'Curso adicionado com sucesso.');
    }

    public function removeCourseFromStudent(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
        ]);

        $student = Student::findOrFail($id);
        $course = Course::findOrFail($request->input('course_id'));
        $student->removeCourse($course);

        return redirect()->route('students.show', $id)->with('success', 'Curso removido com sucesso.');
    }
}