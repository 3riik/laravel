@extends('layout')
@section('content')
<h1>Porovnanie zhody</h1>

{!! Form::open(array('route' => 'compare_result', 'class' => 'form')) !!}

<div class="form-group">
	{!! Form::label('email') !!}
	{!! Form::text('email', null, 
		array('required',
			  'class' => 'form-control',
			  'placeholder' => 'Email')) !!}
</div>
<div class="form-group">
	{!! Form::submit('Porovnať', 
		array('class' => 'btn btn-primary')) !!}
</div>
{!! Form::close() !!}

@stop