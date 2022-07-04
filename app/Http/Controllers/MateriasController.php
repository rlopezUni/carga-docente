<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materia;
use App\Models\Plantel;
use App\Models\Area;
use App\Models\Carrera;
use Illuminate\Support\Facades\Auth;
class MateriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


     public function consulta_areas($areas)
    {
        $area = Carrera::where("area_id",$areas)->get();
        
        return response()->json($area->toArray());
    }
    public function index()
    {
         if(Auth::user()->rol == 1)
        {

        $materias = new Materia();
        $materias = $materias->all();
        
        return view('materias.index',compact('materias'));
        }
        else
        {
            abort(403, 'No puedes ingresar aqui'); 
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         if(Auth::user()->rol == 1)
        {
        $areas = new Area();
        $areas = $areas->all();
        $planteles = new Plantel();
        $planteles = $planteles->all();
        return view('materias.create',compact('areas','planteles'));
        }
        else
        {
            abort(403, 'No puedes ingresar aqui'); 
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $this->validate($request, [
            'id_pwc' => 'unique:materias,id_pwc',
        ]);


        $materias = new Materia();
        $materias->materia =  $request->materia;
        $materias->carrera_id =  $request->carreras;
        $materias->id_pwc =  $request->id_pwc;
        $materias->plantel_id =  $request->plantel;
        
        $materias->horas =  $request->horaInicio .'-'.$request->horaFin;
        
        foreach($request->dias as $dias)
        {
                $materias->dias =  $materias->dias.$dias."-";
        }
        $materias->dias = substr($materias->dias, 0, -1);
        

        $materias->save();

        return redirect()->route('materias.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
