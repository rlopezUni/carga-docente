<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plantel;
use App\Models\Materia;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
class PlantelesController extends Controller
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
        $planteles = new Plantel();
        $planteles = $planteles->all();
        return view('planteles.index',compact('planteles'));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function edit(Plantel $plantele)
    {
        if(Auth::user()->rol == 1)
        {

            //$materiasAsignadas = Materia::where('plantel_id',$plantele->id)->where('status',2)->get();
             $materiasSinAsignar = Materia::where('plantel_id',$plantele->id)->where('status',1)->get();

             return view('planteles.edit',compact('plantele','materiasSinAsignar'));
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
