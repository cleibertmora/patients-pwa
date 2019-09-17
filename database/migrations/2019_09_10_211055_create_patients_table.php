<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('email')->nullable();
            $table->string('cedula')->nullable();
            $table->string('direccion')->nullable();
            $table->enum('doctype', ['pasaporte', 'cedula', 'ruc'])->default('cedula')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->string('foto')->nullable();
            $table->text('enfermedades')->nullable();
            $table->text('datosFamiliares')->nullable();
            $table->integer('clinic_id')->unsigned();

            $table->foreign('clinic_id')->references('id')->on('clinics')
            ->onDelete('cascade')
            ->onUpdate('cascade');

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
        Schema::dropIfExists('patients');
    }
}
