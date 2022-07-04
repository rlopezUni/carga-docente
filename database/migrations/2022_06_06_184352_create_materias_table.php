<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materias', function (Blueprint $table) {
            $table->id();
            $table->string('materia');
            $table->string('id_pwc');
            $table->unsignedBigInteger('carrera_id');
            $table->unsignedBigInteger('plantel_id');
            $table->unsignedBigInteger('modalidad_id');
            $table->foreign('carrera_id')->references('id')->on('carreras')->onDelete('cascade');
            $table->foreign('plantel_id')->references('id')->on('plantels')->onDelete('cascade');
            $table->foreign('modalidad_id')->references('id')->on('modalidads')->onDelete('cascade');
            $table->string('dias');
            $table->string('horas');
            $table->enum('status',[1,2])->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materias');
    }
}
