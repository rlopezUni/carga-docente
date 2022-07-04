<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materia extends Model
{
    use HasFactory;

     public function Area(){

        return $this->belongsTo(Carrera::class,'carrera_id');
    }
         public function Plantel(){

        return $this->belongsTo(Plantel::class);
    }

    public function Docentes(){

        return $this->belongsToMany(Docente::class);
    }

     public function modalidad(){

        return $this->belongsTo(Modalidad::class);
    }
       
        
}
