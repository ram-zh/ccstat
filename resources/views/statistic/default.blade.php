@extends('layoutLte')
@section('content')

@if(isset($result) && $result)
<style>
    th.sorting {
	padding-right: 20px !important;
    }
</style>
<div class="box">
    <div class="box-header">
	<h3 class="box-title">
	    <a href="/statistics/{{$project->Id}}">
		{{$project->Name}}
	    </a> - {{$statistic->Name}} 
	</h3>
    </div>
    <!-- /.box-header -->

    <form action="" method="POST">
	{{ csrf_field() }}
	@if (count($paramsOut))
	<div class="box-body">
            <h5 class="box-title">Доступные параметры</h5>
	    @foreach ($paramsOut as $param)
	    <div class="form-group">
		<label for="Input{{$param->ParamName}}">{{$param->Name}}</label>
		<input type="{{$param->Type}}" class="form-control" id="Input{{$param->ParamName}}" name="{{$param->Id}}">
	    </div>
	    @endforeach
	</div>
	<div class="box-footer">
	    <button type="submit" class="btn btn-primary">Применить</button>
	</div>
	@endif

    </form>

    @if (count($result))
    <div class="nav-tabs-custom box-body">
	<ul class="nav nav-tabs">
	    @foreach ($result as $i => $sheet)
	    <li class="{{($i == 0)?'active':''}}"><a href="#tab_{{$i}}" data-toggle="tab" aria-expanded="true">{{$sheet->title}}</a></li>
	    @endforeach
	</ul>
	<div class="tab-content">
	    @foreach ($result as $i => $sheet)		
	    <div class="tab-pane {{($i == 0)?'active':''}}" id="tab_{{$i}}">
		<div class="table-responsive">
		    <table  class="table table-bordered table-hover js-table-sorter">
			@if(count($sheet->columns))
			<thead>
			    <tr>
				@foreach($sheet->columns as $title)
				<th>{{ $title }}</th>
				@endforeach
			    </tr>
			</thead>
			@endif
			@if(count($sheet->data))
			<tbody>
			    @foreach($sheet->data as $row)
			    <tr>
				@foreach($row as $cell)
				<td>{{ $cell }}</td>
				@endforeach
			    </tr>
			    @endforeach
			</tbody>
			@endif
		    </table>
		</div>
	    </div>
	    <!-- /.tab-pane -->
	    @endforeach
	</div>
	<!-- /.tab-content -->
    </div>
    @endif

</div>
<script>
    $('.js-table-sorter').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
	"pageLength": 15
    });
</script>
@endif
@endsection