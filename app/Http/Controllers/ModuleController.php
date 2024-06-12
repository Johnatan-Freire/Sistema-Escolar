<?php

namespace App\Http\Controllers;

use App\Models\Module;
use Illuminate\Http\Request;

class ModuleController extends Controller
{
    public function index()
    {
        $modules = Module::with('course')->get();
        return view('admin.module', ['modules' => $modules]);
    }

    public function show($id)
    {
        $module = Module::with('course')->findOrFail($id);
        return view('admin.module_show', ['module' => $module]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'nome' => 'required',
        ]);

        $module = Module::create($request->all());
        return redirect()->route('modules.index')->with('success', 'Módulo criado com sucesso.');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'course_id' => 'required|exists:courses,id',
            'nome' => 'required',
        ]);

        $module = Module::findOrFail($id);
        $module->update($request->all());
        return redirect()->route('modules.index')->with('success', 'Módulo atualizado com sucesso.');
    }

    public function destroy($id)
    {
        $module = Module::findOrFail($id);
        $module->delete();
        return redirect()->route('modules.index')->with('success', 'Módulo deletado com sucesso.');
    }
}
