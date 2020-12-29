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

Route::get('/', 'ClientePotenciaControlador@index');

Route::post('/potencias', 'ClientePotenciaControlador@store');

Route::get('/agendados', 'OcoPotenciaControlador@index');

Route::post('/agendados', 'OcoPotenciaControlador@store');

Route::get('/atendidos', 'OcoPotenciaControlador@atendidos');

Route::post('/contato', 'TentativaContatoControlador@store');