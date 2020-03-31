<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;


Route::get('/', 'CalendarioController@index')->name('index');
Route::get('/load-auditorias', 'AuditoriasController@loadAuditorias')->name('routeLoadAuditorias');
Route::put('/update-auditorias', 'AuditoriasController@updateAuditorias')->name('routeUpdateAuditorias');
Route::post('/insert-auditorias', 'AuditoriasController@insertAuditorias')->name('routeInsertAuditorias');
Route::delete('/delete-auditorias', 'AuditoriasController@deleteAuditorias')->name('routeDeleteAuditorias');

Route::get('/get-auditores', 'AuditoriasController@getAuditores')->name('routeGetAuditores');
Route::delete('/delete-auditor', 'AuditoriasController@deleteAuditor')->name('routeDeleteAuditor');







