@extends('dashboard')

@section('content')

<div class = "container">

	<div class="padding">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h2>Create Policy</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
            <div class="form-group">
          
            @if ( count( $errors ) > 0 )
              @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            @endif


            {!!Form::model(['method'=>'POST', 'url' =>['create-policy'] ])!!}
	            <b>{!! Form::label('name','Name') !!}</b>
	               {!! Form::text ('name',null,['class'=>'form-control','foo'=>'bar']) !!}
	           </br>
	            <b>{!! Form::button('Create',['class' => 'form-control','type' => 'submit','style' => 'width:150px' ]) !!}</b>
        </div>
        </div>
      </div>
    </div>
</div>


@stop