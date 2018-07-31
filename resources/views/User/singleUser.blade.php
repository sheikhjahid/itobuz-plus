@extends('dashboard')

@section('content')

<div class="box">

<div class="item">
    
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
         
          <div class="clear m-b">
            <h3 class="m-0 m-b-xs">{{ $userdata->name}}</h3>
            <p class="text-muted"><strong>EmployeeId : </strong><span class="m-r">{{ $userdata->id}}</span></p>
           
          </div>
        </div>
       
        <div class="col-sm-1">
        	 <p class="text">{{ $userdata->email}}</span></p>
        </div>

         <div class="col-sm-7">
        	 <p class="text-muted">{{ $userdata->team->name }}</p>
        </div>

        <div class="col-sm-5">
          <h3 class="text-md profile-status">Status</h3>
            @if($userdata->status == 0)
              <h4 class="active_inactive">{{ "Inactive" }}</h4>
            @else
              <h4 class="active_inactive">{{ "Active" }}</h4>
            @endif
        </div>  

      </div>
    </div>
  </div>

</div>

@stop
