@extends('layoutLte')
@section('content')
<div class="box">
    <div class="box-body">
	@if (count($result))
	    <h4>Доступные отчеты</h4>
	    <ol>
	    @foreach ($result as $statistic)
	    <li>
		<a href="/statistics/get/{{$project->Id}}/{{trim($statistic->id,'"')}}">{{$statistic->name}}</a>
	    </li>
	    @endforeach
	    </ol>
	@endif
    </div>
</div>
@endsection