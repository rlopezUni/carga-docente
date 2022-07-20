<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Docente;
use App\Models\Area;
use App\Models\User;
use App\Models\Materia;
use App\Models\Horario;
use App\Models\Disponibilidad;
use App\Models\Plantel;
use App\Models\Comentarios;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
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
        return view('principal');
        }
        else
        {

            $docente = Docente::where('user_id',Auth::user()->id)->first();
             $areas = [];
                foreach($docente->areas as $area)

                {
                    array_push($areas, $area->id);
                }


            $planteles = Materia::whereIn('carrera_id',$areas)->select('plantel_id')->distinct()->get();

            $enUso = Disponibilidad::where('docente_id',$docente->id)->get();
        

          

                return view('horario',compact('planteles','enUso'));
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
        

            $docente = Docente::where('user_id',Auth::user()->id)->first();

            
          
         if ($request->horaInicioL && $request->horaFinL)
         {
            $enUso = Disponibilidad::where('docente_id',$docente->id)->where('dia','L')->get();
                foreach($enUso as $enUso)
                {


                if($enUso)
                {

                if(strtotime($request->horaInicioL) <= strtotime($enUso->hora_fin) && strtotime($request->horaFinL) >= strtotime($enUso->hora_inicio))
                {   

                            return redirect('/')->with('info','Ya no tienes disponible ese horario En Lunes');
                }

                }
                 }
               

             $duplicado = Disponibilidad::where('docente_id',$docente->id)->where('plantel_id',$request->plantel)->where('dia','L')->first();

             if(!$duplicado)
             {
                $numPlanteles = Disponibilidad::where('docente_id',$docente->id)->select('plantel_id')->distinct()->get();

            $numPlanteles = count($numPlanteles);

                if ($numPlanteles >= 4) {
                        return redirect('/')->with('info','Solo puedes tener 3 planteles');
                }

                

                $horario = new Disponibilidad();
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'L';
                $horario->hora_inicio  = $request->horaInicioL;
                $horario->hora_fin  = $request->horaFinL;
                $horario->save();
             }
             else
             {
                $horario = $duplicado;
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'L';
                $horario->hora_inicio  = $request->horaInicioL;
                $horario->hora_fin  = $request->horaFinL;
                $horario->save();
             }

         
         }
          if ($request->horaInicioM && $request->horaFinM)
         {
             $enUso = Disponibilidad::where('docente_id',$docente->id)->where('dia','M')->get();
               foreach($enUso as $enUso)
                {
             if($enUso)
             {
                if(strtotime($request->horaInicioM) <= strtotime($enUso->hora_fin) && strtotime($request->horaFinM) >= strtotime($enUso->hora_inicio))
                {
                    return redirect('/')->with('info','Ya no tienes disponible ese horario En Martes');
                }
            }
            }
        $duplicado = Disponibilidad::where('docente_id',$docente->id)->where('plantel_id',$request->plantel)->where('dia','M')->first();

             if(!$duplicado)
             {
                $numPlanteles = Disponibilidad::where('docente_id',$docente->id)->select('plantel_id')->distinct()->get();

            $numPlanteles = count($numPlanteles);

                if ($numPlanteles >= 4) {
                        return redirect('/')->with('info','Solo puedes tener 3 planteles');
                }
                $horario = new Disponibilidad();
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'M';
                $horario->hora_inicio  = $request->horaInicioM;
                $horario->hora_fin  = $request->horaFinM;
                $horario->save();
             }
             else
             {
                $horario = $duplicado;
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'M';
                $horario->hora_inicio  = $request->horaInicioM;
                $horario->hora_fin  = $request->horaFinM;
                $horario->save();
             }
         }
               if ($request->horaInicioI && $request->horaFinI)
         {

            $enUso = Disponibilidad::where('docente_id',$docente->id)->where('dia','I')->get();
              foreach($enUso as $enUso)
                {
            if($enUso)
            {
                if(strtotime($request->horaInicioI) <= strtotime($enUso->hora_fin) && strtotime($request->horaFinI) >= strtotime($enUso->hora_inicio))
                {
                    return redirect('/')->with('info','Ya no tienes disponible ese horario En Miercoles');
                }
             }
         }
        $duplicado = Disponibilidad::where('docente_id',$docente->id)->where('plantel_id',$request->plantel)->where('dia','I')->first();

             if(!$duplicado)
             {
                $numPlanteles = Disponibilidad::where('docente_id',$docente->id)->select('plantel_id')->distinct()->get();

            $numPlanteles = count($numPlanteles);

                if ($numPlanteles >= 4) {
                        return redirect('/')->with('info','Solo puedes tener 3 planteles');
                }
                $horario = new Disponibilidad();
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'I';
                $horario->hora_inicio  = $request->horaInicioI;
                $horario->hora_fin  = $request->horaFinI;
                $horario->save();
             }
             else
             {
                $horario = $duplicado;
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'I';
                $horario->hora_inicio  = $request->horaInicioI;
                $horario->hora_fin  = $request->horaFinI;
                $horario->save();
             }
         }
            if ($request->horaInicioJ && $request->horaFinJ)
         {
            
            $enUso = Disponibilidad::where('docente_id',$docente->id)->where('dia','J')->get();
              foreach($enUso as $enUso)
                {
             if($enUso)
            {

                if(strtotime($request->horaInicioJ) <= strtotime($enUso->hora_fin) && strtotime($request->horaFinJ) >= strtotime($enUso->hora_inicio))
                {
                    return redirect('/')->with('info','Ya no tienes disponible ese horario En Jueves');
                }
            }
        }
         $duplicado = Disponibilidad::where('docente_id',$docente->id)->where('plantel_id',$request->plantel)->where('dia','J')->first();

             if(!$duplicado)
             {
                $numPlanteles = Disponibilidad::where('docente_id',$docente->id)->select('plantel_id')->distinct()->get();

            $numPlanteles = count($numPlanteles);

                if ($numPlanteles >= 4) {
                        return redirect('/')->with('info','Solo puedes tener 3 planteles');
                }
                $horario = new Disponibilidad();
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'J';
                $horario->hora_inicio  = $request->horaInicioJ;
                $horario->hora_fin  = $request->horaFinJ;
                $horario->save();
             }
             else
             {
                $horario = $duplicado;
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'J';
                $horario->hora_inicio  = $request->horaInicioJ;
                $horario->hora_fin  = $request->horaFinJ;
                $horario->save();
             }
         }
            if ($request->horaInicioV && $request->horaFinV)
         {
            $enUso = Disponibilidad::where('docente_id',$docente->id)->where('dia','V')->get();
              foreach($enUso as $enUso)
                {
             if($enUso)
            {

                if(strtotime($request->horaInicioV) <= strtotime($enUso->hora_fin) && strtotime($request->horaFinV) >= strtotime($enUso->hora_inicio))
                {
                    return redirect('/')->with('info','Ya no tienes disponible ese horario En Viernes');
                }
            }   
        }
             
         $duplicado = Disponibilidad::where('docente_id',$docente->id)->where('plantel_id',$request->plantel)->where('dia','V')->first();

             if(!$duplicado)
             {
                $numPlanteles = Disponibilidad::where('docente_id',$docente->id)->select('plantel_id')->distinct()->get();

            $numPlanteles = count($numPlanteles);

                if ($numPlanteles >= 4) {
                        return redirect('/')->with('info','Solo puedes tener 3 planteles');
                }
                $horario = new Disponibilidad();
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'V';
                $horario->hora_inicio  = $request->horaInicioV;
                $horario->hora_fin  = $request->horaFinV;
                $horario->save();
             }
             else
             {
                $horario = $duplicado;
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'V';
                $horario->hora_inicio  = $request->horaInicioV;
                $horario->hora_fin  = $request->horaFinV;
                $horario->save();
             }
         }
            if ($request->horaInicioS && $request->horaFinS)
         {

            $enUso = Disponibilidad::where('docente_id',$docente->id)->where('dia','S')->get();
              foreach($enUso as $enUso)
                {
                 if($enUso)
            {
                if(strtotime($request->horaInicioS) <= strtotime($enUso->hora_fin) && strtotime($request->horaFinS) >= strtotime($enUso->hora_inicio))
                {
                    return redirect('/')->with('info','Ya no tienes disponible ese horario En Sabado');
                }
             }
         }
        $duplicado = Disponibilidad::where('docente_id',$docente->id)->where('plantel_id',$request->plantel)->where('dia','S')->first();

             if(!$duplicado)
             {
                $numPlanteles = Disponibilidad::where('docente_id',$docente->id)->select('plantel_id')->distinct()->get();

            $numPlanteles = count($numPlanteles);

                if ($numPlanteles >= 4) {
                        return redirect('/')->with('info','Solo puedes tener 3 planteles');
                }
                $horario = new Disponibilidad();
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'S';
                $horario->hora_inicio  = $request->horaInicioS;
                $horario->hora_fin  = $request->horaFinS;
                $horario->save();
             }
             else
             {
                $horario = $duplicado;
                $horario->docente_id = $docente->id;
                $horario->plantel_id = $request->plantel;
                $horario->dia = 'S';
                $horario->hora_inicio  = $request->horaInicioS;
                $horario->hora_fin  = $request->horaFinS;
                $horario->save();
             }
         }
             if(!$request->horaInicioL && !$request->horaFinL && !$request->horaInicioM && !$request->horaFinM && !$request->horaInicioI && !$request->horaFinI && !$request->horaInicioJ && !$request->horaFinJ  && !$request->horaInicioV && !$request->horaFinV  && !$request->horaInicioS && !$request->horaFinS)
            {
                 return redirect('/')->with('info','selecciona al menos un dia');
            }
            $areas = [];
                foreach($docente->areas as $area)

                {
                    array_push($areas, $area->id);
                }
            

             $materiasDisponibles = Materia::where('plantel_id',$horario->plantel_id)->whereIn('carrera_id',$areas)->get();

                

            return view('principal',compact('docente','materiasDisponibles'));

            

            
            
            
            


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
        $docente = Docente::where('user_id',Auth::user()->id)->first();
       $materia = Materia::findorfail($id);

       $horario = new Horario();
       $horario->docente_id = $docente->id;
       $horario->materia_id = $id;
       $horario->plantel_id = $materia->plantel_id;
       //$horario->dias = $materia->dias;
       //$porciones = explode("-", $materia->horas);
       //$horario->hora_inicio = $porciones[0];
       //$horario->hora_fin = $porciones[1];
       $horario->save();
       $materia->Docentes()->attach($docente->id);

     $areas = [];
                foreach($docente->areas as $area)

                {
                    array_push($areas, $area->id);
                }
            

             $materiasDisponibles = Materia::where('plantel_id',$horario->plantel_id)->whereIn('carrera_id',$areas)->get();


             
             

            return view('principal',compact('docente','materiasDisponibles'));





    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Disponibilidad::findorfail($id)->delete();
        return redirect()->route('principal.index')->with('info','Se Elimino correctamente');
    }



    public function otro_index()
    {
        $docente = Docente::where('user_id',Auth::user()->id)->first();
            /*
             $materiasAsignadas = DB::table('materia_docente')
             ->join('materias', function ($join){
                 $join->on('materia_docente.materia_id', '=', 'materias.id');
                 })->join('docentes', function ($join){
                 $join->on('materia_docente.docente_id', '=', 'docentes.id');
             })->join('plantels', function ($join){
                 $join->on('materias.plantel_id', '=', 'plantels.id');
             })->where('docentes.id',$docente->id)->select('materias.*','docentes.*')->get();
             */

             
              $areas = [];
                foreach($docente->areas as $area)

                {
                    array_push($areas, $area->id);
                }
             $materiasDisponibles = Materia::where('status',1)->whereIn('carrera_id',$areas)->get();
             
             
             

            return view('principal',compact('docente','materiasDisponibles'));
    }

    public function comentarios(Request $request)
    {

        $docente = Docente::where('user_id',Auth::user()->id)->first();
         $comentarios = new Comentarios();
         $comentarios->docente_id = $docente->id;
         $comentarios->comentarios = $request->comentario;
         $comentarios->save();

         return redirect('/')->with('info','Gracias por los comentarios');

    }
}
