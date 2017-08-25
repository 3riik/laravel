@extends('layout')


@section('content')
<h1>Registrácia</h1>




{!! Form::open(array('route' => 'register_store', 'class' => 'form')) !!}

<div class="form-group">
	{!! Form::label('Meno') !!}
	{!! Form::text('name', null, 
		array('required',
			  'class' => 'form-control',
			  'placeholder' => 'Meno')) !!}
</div>

<div class="form-group">
	{!! Form::label('Email') !!}
	{!! Form::text('email', null, 
		array('required',
			  'class' => 'form-control',
			  'placeholder' => 'Email')) !!}
</div>

<div class="form-group">
<p>Plávanie:
	@for ($i = 1; $i<6; $i++)
	<label class="radio-inline">
	{!! Form::radio('swim', $i) !!} {{$i}}
	</label>
	@endfor
</p>

<p>Bicyklovanie:
	@for ($i = 1; $i<6; $i++)
	<label class="radio-inline">
	{!! Form::radio('bicykel', $i) !!} {{$i}}
	</label>
	@endfor
</p>


<p>Beh:
	@for ($i = 1; $i<6; $i++)
	<label class="radio-inline">
	{!! Form::radio('run', $i) !!} {{$i}}
	</label>
	@endfor
</p>

<p>Turistika:
	@for ($i = 1; $i<6; $i++)
	<label class="radio-inline">
	{!! Form::radio('tourism', $i) !!} {{$i}}
	</label>
	@endfor
</p>

<p>Lezenie:
	@for ($i = 1; $i<6; $i++)
	<label class="radio-inline">
	{!! Form::radio('climbing', $i) !!} {{$i}}
	</label>
	@endfor
</p>
</div>

<div class="form-group">
	{!! Form::submit('Register', 
		array('class' => 'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
@stop
