@extends('dashboard')

@section('content')

<div class = "container">

	<div class="padding">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h2>Create a user</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
            <div class="form-group">
          
            @if ( count( $errors ) > 0 )
              @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            @endif

            {!!Form::open(['method'=>'POST','url' =>['/create-user']])!!}

	           <b>{!! Form::label('name','Name') !!}</b>
	               {!! Form::text ('name',null,['class'=>'form-control','foo'=>'bar','placeholder'=>'Enter your name here..']) !!}
	           </br>
	           <b>{!! Form::label('email','Email') !!}</b>
	               {!! Form::text('email',null,['class'=>'form-control','foo'=>'bar','placeholder'=>'Enter your email here..']) !!}
	           </br>
	           <b>{!! Form::label('password','Password') !!}</b>
	               {!! Form::password('password',null,['class'=>'form-control','id'=>'password','foo'=>'bar','placeholder'=>'Enter your password here..']) !!}
	           </br>
	           </br>
	           <b>{!! Form::label('confirm_password','Confirm-Password') !!}</b>
	               {!! Form::password ('confirm_password',null,['class'=>'form-control','id'=>'confirm_password','foo'=>'bar','placeholder'=>'Retype your password..']) !!}
	           </br>
	           </br>
	            <b>{!! Form::label('contact','Contact') !!}</b>
	               {!! Form::text ('phone',null,['class'=>'form-control','foo'=>'bar','placeholder'=>'Enter your contact no. here..']) !!}
	           </br>
	           <b>{!! Form::label('address','Address') !!}</b>
	               {!! Form::text ('address',null,['class'=>'form-control','foo'=>'bar','placeholder'=>'Enter your address here..']) !!}
	          </br>
	          </br>
	          <b><label for="Select Team">Select Team</label>
	          <select class="team-dropdown" name="team_id" style="border:none;background-color:#3384ca78">
	          	@foreach($teamdata as $team)
	          	<option value="{{$team->id}}">{{ $team->name }}</option>
	          	@endforeach
	          </select></b>
	          </br>
	          </br>
	           <b><label for="Select Role">Select Role</label>
	          <select class="role-dropdown" name="role_id" style="border:none;background-color:#3384ca78">
	          	@foreach($roledata as $role)
	          	<option value="{{$role->id}}">{{ $role->name }}</option>
	          	@endforeach
	          </select></b>
	          </br>
	          </br>
	            <b>{!! Form::button('Create',['class' => 'form-control','type' => 'submit','style' => 'width:150px' ]) !!}</b>
            {!!Form::close()!!}
        </div>
      </div>
    </div>
</div>

@stop