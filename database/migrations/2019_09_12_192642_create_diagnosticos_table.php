<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiagnosticosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosticos', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('procedimiento_id')->unsigned();
            $table->integer('consulta_id_realizado')->unsigned()->nullable();
            $table->integer('paciente_id')->unsigned()->nullable();

            $table->foreign('procedimiento_id')->references('id')->on('procedimientos')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('consulta_id_realizado')->references('id')->on('consultas')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('paciente_id')->references('id')->on('patients')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->enum('estado', ['previo', 'realizado', 'pendiente'])->default('pendiente');
            $table->enum('pago', ['no pagado', 'pagado'])->default('no pagado');
            $table->string('tipo_pago')->default('efectivo');
            $table->text('evolucion')->nullable();
            $table->string('pieza')->nullable();
            $table->string('zona')->nullable();

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
        Schema::dropIfExists('diagnosticos');
    }
}
