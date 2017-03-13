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
	
    </div>
    <!-- /.box-header -->

  

    @if (count($result))
    <div class="nav-tabs-custom box-body">
	
	<div class="tab-content">
	    @foreach ($result as $i => $sheet)		
	    <div class="tab-pane {{($i == 0)?'active':''}}" id="tab_{{$i}}">
		<div class="table-responsive">
		    <table  class="table table-bordered table-hover js-table-sorter">
			
			@if(count($sheet))
			<tbody>
			    @foreach($sheet as $row)
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