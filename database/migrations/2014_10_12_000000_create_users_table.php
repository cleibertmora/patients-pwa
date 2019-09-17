<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->enum('level', ['superadmin', 'admin', 'doctor'])->default('doctor')->nullable();
            $table->enum('titulo', ['Dr. ', 'Dra. '])->nullable();
            $table->string('foto')->nullable();
            $table->string('cedula')->nullable();
            $table->enum('doctype', ['pasaporte', 'cedula', 'ruc'])->default('cedula')->nullable();
            $table->string('celular')->nullable();
            $table->string('telefono')->nullable();
            $table->integer('clinic_id')->unsigned()->nullable();

            $table->foreign('clinic_id')->references('id')->on('clinics')
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
