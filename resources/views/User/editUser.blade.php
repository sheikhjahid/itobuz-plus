@extends('dashboard')

@section('content')

<div class = "container">

	<div class="padding">
  <div class="row">
    <div class="col-md-6">
      <div class="box">
        <div class="box-header">
          <h2>Update Details of {{$userdata->name}}</h2>
        </div>
        <div class="box-divider m-0"></div>
        <div class="box-body">
            <div class="form-group">
          
            @if ( count( $errors ) > 0 )
              @foreach ($errors->all() as $error)
                  <div>{{ $error }}</div>
              @endforeach
            @endif


            {!!Form::model($userdata, ['method'=>'POST', 'url' =>['/update-users', $userdata->id] ])!!}
	            <b>{!! Form::label('contact','Contact') !!}</b>
	               {!! Form::text ('phone',null,['class'=>'form-control','foo'=>'bar','value' => $userdata->phone]) !!}

	           </br>
	           <b>{!! Form::label('address','Address') !!}</b>
	               {!! Form::text ('address',null,['class'=>'form-control','foo'=>'bar','value' => $userdata->address]) !!}
	          </br>
	          </br>
	          <b><label for="Select Team">Edit Team</label>
	          <select class="team-dropdown" name="team_id" style="border:none;background-color:#3384ca78">
	          	@foreach($teamData as $team)
	          	<option value="{{$team->id}}">{{ $team->name }}</option>
	          	@endforeach
	          </select></b>
	          </br>
	          </br>
	           <b><label for="Select Role">Edit Role</label>
	          <select class="role-dropdown" name="role_id" style="border:none;background-color:#3384ca78">
	          	@foreach($roleData as $role)
	          	<option value="{{$role->id}}">{{ $role->name }}</option>
	          	@endforeach
	          </select></b>
	          </br>
	          </br>
	            <b>{!! Form::button('Update',['class' => 'form-control','type' => 'submit','style' => 'width:150px' ]) !!}</b>
            </div>
        </div>
      </div>
    </div>
</div>


@stop