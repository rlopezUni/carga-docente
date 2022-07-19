<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;

class materiasReport implements FromCollection,WithHeadings
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
              'Materia',
              'Materia ID'
              
          ];
    }
    public function collection()
    {
        ini_set('memory_limit', '300M');

           $reporte = DB::table('docente_materia')
             ->join('docentes', function ($join){
                 $join->on('docentes.id', '=', 'docente_materia.docente_id');
             })
                          
                          ->join('materias', function ($join){
                 $join->on('materias.id', '=', 'docente_materia.materia_id');
             })
                          ->join('plantels', function ($join){
                 $join->on('plantels.id', '=', 'materias.plantel_id');
             })
        
             ->select('docentes.id_pwc as id_Docente','docentes.nombres','docentes.apellidos','plantels.plantel','materias.materia','materias.id_pwc as Materia ID')
             ->get();

         return $reporte;

    }
}
