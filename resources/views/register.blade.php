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

<div class="form-group" >
	<label class="radio">Plávanie:</label>
	@for ($i = 1; $i<6; $i++)
	
	{!! Form::radio('swim', $i, false, ['id' => 'swim'.$i,]) !!} 
	<label for="swim{{$i}}">
	 {{$i}}
	</label>
	@endfor

</div>
<div class="form-group" style="">
<label class="radio">Bicyklovanie:</label>
	@for ($i = 1; $i<6; $i++)
	
	{!! Form::radio('bicykel', $i, false, ['id' => 'bicykel'.$i,]) !!} 
	<label for="bicykel{{$i}}">
	 {{$i}}
	</label>
	@endfor

</div>
<div class="form-group">
<label class="radio">Beh:</label>
	@for ($i = 1; $i<6; $i++)
	
	{!! Form::radio('run', $i, false, ['id' => 'run'.$i,]) !!} 
	<label for="run{{$i}}">
	 {{$i}}
	</label>
	@endfor

</div>
<div class="form-group">
	<label class="radio">Turistika:</label>
	@for ($i = 1; $i<6; $i++)
	
	{!! Form::radio('tourism', $i, false, ['id' => 'tourism'.$i,]) !!} <label for="tourism{{$i}}">
	 {{$i}}
	</label>
	
	@endfor

</div>
<div class="form-group">
<label class="radio">Lezenie:</label>
	@for ($i = 1; $i<6; $i++)
	
	{!! Form::radio('climbing', $i, false, ['id' => 'climbing'.$i,]) !!}
	<label for="climbing{{$i}}">
	 {{$i}}
	</label>
	@endfor

</div>

<div class="form-group">
	{!! Form::submit('Register', 
		array('class' => 'btn btn-primary')) !!}
</div>
{!! Form::close() !!}
@stop
