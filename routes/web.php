<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::group(['middleware' => ['auth']], function(){
    Route::get('/home', 'HomeController@index')->name('home');
    Route::resource('/pacientes', 'PatientController');
    Route::get('/diagnostic/{id}', 'DiagnosticController@index')->name('diagnosticos');
    Route::post('/diagnostic/insert', 'DiagnosticController@insert')->name('diagnosticos.insert');
    Route::resource('/consultas', 'ConsultaController')->except('index');
    Route::get('/consultas/listado/get', 'ConsultaController@index')->name('listado');
    //Route::get('/consultas/{idpaciente}/create', 'ConsultaController@create')->name('nuevaConsulta');
    Route::post('/consultas/evolucion', 'ConsultaController@evolucion')->name('consultas.evolucion');
});