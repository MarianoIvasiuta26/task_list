<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Tarea;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(){
        $tareas = Tarea::paginate(3);
        return view ('task.index', ['tareas' => $tareas]);
    }

    public function create(){
        return view('task.create');
    }

    public function store(Request $request){

        //validacion de formulario
        $request->validate([
            'nombre_tarea' => 'required',
            'fecha_vencimiento' => 'required',
            'hora_vencimiento' => 'required',
            'prioridad' => 'required',
        ],$message =['required'=>'el campo :attribute es requerido']);

        //guardar datos

        $tareas = new Tarea();
        $tareas->nombre_tarea = $request->post('nombre_tarea');
        $tareas->fecha_vencimiento = $request->post('fecha_vencimiento');
        $tareas->hora_vencimiento = $request->post('hora_vencimiento');
        $tareas->prioridad = $request->post('prioridad');

        $tareas->save();

        return redirect()->route('task')->with('success', 'Tarea creada exitosamente');

    }

    public function edit($id){
        $tareas = Tarea::find($id);

        if(!$tareas){
            return redirect()->route('task.index');
        }
        return view('task.edit', ['tareas' => $tareas]);
    }

    public function update(Request $request, $id){
        $tareas = Tarea::find($id);
        $tareas->nombre_tarea = $request->post('nombre_tarea');
        $tareas->fecha_vencimiento = $request->post('fecha_vencimiento');
        $tareas->hora_vencimiento = $request->post('hora_vencimiento');
        $tareas->prioridad = $request->post('prioridad');

        $tareas->save();

        return redirect()->route('task')->with('success', 'Tarea actualizada exitosamente');
    }

    public function destroy($id){
        $tareas = Tarea::find($id);
        $tareas->delete();

        return redirect()->route('task')->with('success', 'Tarea eliminada exitosamente');
    }

    public function completado($id){
        $tareas = Tarea::find($id);

        if(!$tareas){
            return redirect()->route('task.index')->with('error', 'Tarea no encontrada');
        }
        
        $tareas->completado = true;

        $tareas->save();

        return redirect()->route('task')->with('success', 'Tarea completada exitosamente');
    }

    public function eliminarTareasVencidas(){
        Tarea::where('fecha_vencimiento', '<', now())->delete();
        return redirect()->route('task')->with('success', 'Tareas vencidas eliminadas exitosamente');
    }

}
