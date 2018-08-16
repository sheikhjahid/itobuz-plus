@extends('dashboard')

@section('content')

@if(session()->has('create_success'))
<div class="alert alert-success">
    {{ session()->get('create_success') }}
</div>
@endif
@if(session()->has('create_failure'))
<div class="alert alert-success">
    {{ session()->get('create_failure') }}
</div>
@endif

<div class="box">
    <div class="box-header">
      <h2>Leave Taken</h2>
      @if(Auth::user()->role_id==4 || Auth::user()->role_id==5)
      <button class="btn btn-default" id="modal_button" data-target="#leave_create" data-toggle="modal">Apply Leave <i class="fa fa-pencil"></i></button>
      @include('Modal.createLeaveModal')
      @endif
    </div>
    <ul class="nav nav-tabs">
    <p>
    <li class="active"><a data-toggle="tab" href="#pending">Pending | </a></li> 
    <li><a data-toggle="tab" href="#approved"> Approved | </a></li> 
    <li><a data-toggle="tab" href="#rejected"> Rejected </a></li>
    </p>
    </ul>
    <div class="tab-content">
        @include('Leave.appliedLeave') 
        @include('Leave.approvedLeave')
        @include('Leave.rejectedLeave')
   </div>
</div>

@stop