<?php
namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSchedule;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('schedules', 'modules')->get();
        return view('admin.course', ['courses' => $courses]);
    }

    public function create(){
        return view('admin.course.register');
    }

    public function show($id)
    {
        $course = Course::with('schedules', 'modules')->findOrFail($id);
        return view('admin.course_show', ['course' => $course]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'carga_horaria' => 'required|integer',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|string',
            'preco' => 'required|numeric',
            'dias' => 'required|array',
            'turno' => 'required|array',
        ]);

        $course = Course::create($request->only(['nome', 'carga_horaria', 'descricao', 'imagem', 'preco']));

        foreach ($request->dias as $index => $dia) {
            CourseSchedule::create([
                'course_id' => $course->id,
                'dias' => $dia,
                'turno' => $request->turno[$index],
            ]);
        }

        return redirect()->route('courses.index')->with('success', 'Curso criado com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'carga_horaria' => 'required|integer',
            'descricao' => 'nullable|string',
            'imagem' => 'nullable|string',
            'preco' => 'required|numeric',
            'dias' => 'required|array',
            'turno' => 'required|array',
        ]);

        $course = Course::findOrFail($id);
        $course->update($request->only(['nome', 'carga_horaria', 'descricao', 'imagem', 'preco']));

        // Atualizar horários
        $course->schedules()->delete();
        foreach ($request->dias as $index => $dia) {
            CourseSchedule::create([
                'course_id' => $course->id,
                'dias' => $dia,
                'turno' => $request->turno[$index],
            ]);
        }

        return redirect()->route('courses.index')->with('success', 'Curso atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();
        return redirect()->route('courses.index')->with('success', 'Curso deletado com sucesso.');
    }
}
