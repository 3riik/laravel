@extends('layout')
@section('content')
	@if (count($results) < 1)
		<p class = "alert alert-danger">Nemám s kým porovnávať.</p>
		<a href="/register">Registrácia</a>
	@else
	<h3>Results for {{ $current_user }}</h3>
		@for ($i = 0; $i < count($results); $i++)
			{{ $results[$i]['name'].': '.$results[$i]['result'].'%' }}
			<br>
		@endfor
	@endif
@stop