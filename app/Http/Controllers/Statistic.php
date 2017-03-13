<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use App\Models\Project;
use Illuminate\Support\Facades\DB;

class Statistic extends Controller {

    public function listing(Request $request, $projectId) {
	$pgsql = DB::connection('pgsql');
	$pId = $pgsql->getPdo()->quote($projectId);
	$project = Project::findOrFail($projectId);
	$localData = $pgsql->select('SELECT "Id" FROM "ReportsList" WHERE "ProjectId" = '.$pId);
	if(!$localData){
	    if ($content = @file_get_contents($project->APIBaseUrl . 'statList')) {		
		$quotedContent = $pgsql->getPdo()->quote($content);
		$quotedTitle = $pgsql->getPdo()->quote($project->Name);		
		$pgsql->insert('INSERT INTO "ReportsList" ( "Stat" , "ProjectId" , "Title") VALUES ( '.$quotedContent.' ,  '.$pId.' , '.$quotedTitle.' ) ');
	    }
	}
	
	
	$result = $pgsql->select("SELECT json_array_elements(\"Stat\")::jsonb->'Id' as Id , "
		    . " json_array_elements(\"Stat\")::jsonb->'Name'  as Name "
		    . " FROM \"ReportsList\" WHERE \"ProjectId\" = ".$pId);
		
	if ($result){
	    return view('statistic.root', [
		'result' => $result,
		'project' => $project
	    ]);
	} else {
	    return view('statistic.error');
	}
    }

    public function showStatistic(Request $request , $projectId, $statId) {
	ini_set('memory_limit', '1G');
	$pgsql = DB::connection('pgsql');
	$project = Project::findOrFail($projectId);
	$pId = $pgsql->getPdo()->quote($projectId);
	$rId = $pgsql->getPdo()->quote($statId);
	$localData = $pgsql->select('SELECT "Id" FROM "Reports" WHERE "ProjectId" = '.$pId.' AND "ReportId" = '.$rId);
	
	if (!$localData){ // Пишем в бд данные т.к. локальной копии нет
	    if($request->method() == 'POST') { // проверям пришли ли какие то параметры
		$data = json_encode($request->request->all());
		$urlAPI = $project->APIBaseUrl . 'getStat/' . $statId.'?requestStr='.$data;	    
	    } else $urlAPI = $project->APIBaseUrl . 'getStat/' . $statId;
	    
	    if ($content = @file_get_contents($urlAPI)){
		$quotedContent = $pgsql->getPdo()->quote($content);
		$pgsql->insert('INSERT INTO "Reports" ( "ReportId" , "ProjectId" , "ReportData") VALUES ( '.$rId.' ,  '.$pId.' , '.$quotedContent.' ) ');
	    }
	}
	
	$params = @file_get_contents($project->APIBaseUrl . 'getStatParams/' . $statId);
	$limit = 'LIMIT 10';
	//$result = $pgsql->select('SELECT jsonb_array_elements(jsonb_array_elements("ReportData"->\'result\')->\'data\') FROM "Reports" WHERE "ReportId" = '.$rId);
	$result = $pgsql->select('SELECT jsonb_array_elements(jsonb_array_elements("ReportData"->\'result\')->\'data\') as result FROM "Reports" WHERE "ReportId" = '.$rId.$limit);
	
	//$result = json_decode($result[0]->ReportData);
		
	//$report = $pgsql->select('SELECT "ReportData"->\'report\'->\'Name\' as Name FROM "Reports" WHERE "ReportId" = '.$rId);
	
	if ($result) {	 
	    $resultArray = \stdClass;
	    
	    foreach ($result as $key){		
		$resultArray-> = json_decode($key->result);
	    }
	    var_dump($resultArray);
	    return view('statistic.defaultTest', [
		'result' => $resultArray,
		'project' => $project,
		'paramsOut' => json_decode($params),
		//'statistic' => $result->report
	    ]);
	} else {
	    return view('statistic.error');
	}
    }

    /**
     * Display a listing of the resource.
     * GET /statistic
     *
     * @return Response
     */
    public function index() {
	
    }

    /**
     * Show the form for creating a new resource.
     * GET /statistic/create
     *
     * @return Response
     */
}
