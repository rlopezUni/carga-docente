<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    use HasFactory;



     public function areas(){
        return $this->belongsToMany(Carrera::class);
    }
    public function materias(){
        return $this->belongsToMany(Materia::class);
    }
    public function usuario(){

        return $this->belongsTo(User::class);
    }
    
}
