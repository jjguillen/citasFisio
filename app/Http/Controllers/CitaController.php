<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cita;
use App\Models\Hora;
use App\Models\Servicio;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\DocBlock\Tags\Var_;

class CitaController extends Controller
{
    /**
     * Display horas libres en una fecha
     *
     * @return \Illuminate\Http\Response
     */
    public function horasDisp($fecha)
    {
        //Sacar las horas libres esa fecha
        $horasLibres = Hora::select('hora')->whereNotIn('hora', Cita::select('hora')->where('fecha',$fecha)->get())->get();
        foreach($horasLibres as $hora) {
            echo "<option value='{$hora->hora}'>{$hora->hora}:00</option>";
        }


    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Sacar id de usuario autenticado
        $id = Auth::id();
        //Sacar las citas del usuario que se ha logueado
        $citas = Cita::where('user_id', $id)->get();

        return view('dashboard',['citas' => $citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horas = Hora::all();
        $servicios = Servicio::all();
        return view('createCita',['servicios' => $servicios, 'horas' => $horas]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cita = new Cita;
        $cita->fecha = $request->fecha;
        $cita->hora = $request->hora;
        $cita->observaciones = $request->observaciones;
        $cita->servicio_id = $request->servicio;
        $cita->user_id = Auth::id();
        $cita->save();
        return redirect()->route('citas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cita = Cita::find($id);
        if ($cita->user_id == Auth::id()) {
            $servicios = Servicio::all();
            //Sacar las horas libres esa fecha
            $horasLibres = Hora::select('hora')->whereNotIn('hora', Cita::select('hora')->where('fecha',$cita->fecha)->get())->get();

            return view('updateCita',['servicios' => $servicios, 'cita' => $cita, 'horasLibres' => $horasLibres]);
        } else {
            abort(403);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cita = Cita::find($id);
        if ($cita->user_id == Auth::id()) {
            $cita->fecha = $request->fecha;
            $cita->hora = $request->hora;
            $cita->observaciones = $request->observaciones;
            $cita->servicio_id = $request->servicio;
            $cita->user_id = Auth::id();
            $cita->save();
        } else {
            abort(403);
        }
        
        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        if ($cita->user_id == Auth::id()) {
            Cita::destroy($id);
        } else {
            abort(403);
        }
        
        
        return redirect()->route('citas.index');

    }
}
