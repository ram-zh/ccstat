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

use App\Models\Project;

Route::get('/', function () {
    return view('statistic.main' , ['projects' => Project::all()]);
});

Route::group(['prefix' => 'statistics'], function() {
    Route::get('{projectId}', 'Statistic@listing');
    Route::get('get/{projectId}/{statId}', 'Statistic@showStatistic');
    Route::post('get/{projectId}/{statId}', 'Statistic@showStatistic');
});

Route::any('login', 'Auth@login');
