<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class horarioReport implements FromCollection,WithHeadings
{
  /**
  * @return \Illuminate\Support\Collection
  */


    public function headings(): array
    {
          return [
              'id_Docente',
              'Nombres',
              'Apellidos',
              'Plantel',
              'Dia',
              'Hora Inicio',
              'Hora fin'
          ];
    }
    public function collection()
    {
        ini_set('memory_limit', '300M');

           $reporte = DB::table('disponibilidads')
             ->join('docentes', function ($join){
                 $join->on('docentes.id', '=', 'disponibilidads.docente_id');
             })
                          ->join('plantels', function ($join){
                 $join->on('plantels.id', '=', 'disponibilidads.plantel_id');
             })
        
             ->select('docentes.id_pwc','docentes.nombres','docentes.apellidos','plantels.plantel','disponibilidads.dia','disponibilidads.hora_inicio','disponibilidads.hora_fin')
             ->get();

         return $reporte;

    }
}
