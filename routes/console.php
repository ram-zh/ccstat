<?php

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('test', function () {
	$groups0 = DB::table('Groups')->get();
	$groups1 = \App\Models\Group::all();
	var_dump($groups0, $groups1);
});
