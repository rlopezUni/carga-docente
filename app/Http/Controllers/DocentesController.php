<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Area;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class DocentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::user()->rol == 1)
        {



        $docentes = new Docente();
        $docentes = $docentes->all();
        return view('docentes.index',compact('docentes'));
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
        return view('docentes.create',compact('areas'));
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
            'idpwc' => 'unique:docentes,id_pwc',
        ]);



        $docentes = new Docente();
        $docentes->nombres =  $request->nombres;
        $docentes->apellidos=  $request->apellidos;
        $docentes->id_pwc =  $request->idpwc;

        

        
        $usuario = new User();
        $usuario->name = $docentes->nombres." ".$docentes->apellidos;
        $usuario->email = $request->correo;
        $usuario->password = bcrypt('Univer#1');
        $usuario->rol = 2;
        $usuario->save();
        $docentes->user_id = $usuario->id;
        $docentes->save();
        $docentes->areas()->attach($request->areas);

        return redirect()->route('docentes.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Docente $docente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Docente $docente)
    {
         if(Auth::user()->rol == 1)
        {
                /*
       $areas = DB::table('area_docente')
             ->join('areas', function ($join){
                 $join->on('area_docente.area_id', '=', 'areas.id');
                 })->join('docentes', function ($join){
                 $join->on('area_docente.docente_id', '=', 'docentes.id');
             })->where('docentes.id',$docente->id)->select('areas.area')->get();

                 
                 $materias = DB::table('materia_docente')
             ->join('materias', function ($join){
                 $join->on('materia_docente.materia_id', '=', 'materias.id');
                 })->join('docentes', function ($join){
                 $join->on('materia_docente.docente_id', '=', 'docentes.id');
             })->join('plantels', function ($join){
                 $join->on('materias.plantel_id', '=', 'plantels.id');
             })->where('docentes.id',$docente->id)->select('materias.*','plantels.*')->get();

            */    

        return view('docentes.edit',compact('docente'));
        }
        else
        {
            abort(403, 'No puedes ingresar aqui'); 
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Docente $docente)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Docente $docente)
    {
        //
    }
}
