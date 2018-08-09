@extends('dashboard')

@section('content')

<div class="box">

  <div class="item">

    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">

          <div class="clear m-b">
            <h3 class="m-0 m-b-xs">{{ $leavedata->name}}</h3>
            <p class="text-muted"><strong>Leave-Id : </strong><span class="m-r">{{ $leavedata->id}}</span></p>
          </div>
        </div>
      </div>
    </div>

    <div class="table-responsive">
      <left><h2>Associated User for {{ $leavedata->name }}</h2></left>
      @include('Search.searchLeaveUser')
      <table ui-jp="dataTable" ui-options="{
          sAjaxSource: 'api/datatable.json',
          aoColumns: [
            { mData: 'engine' },
            { mData: 'browser' },
            { mData: 'platform' },
            { mData: 'version' },
            { mData: 'grade' }
          ]
        }" class="table table-striped b-t b-b">
        <thead>
          <tr>
            <th style="width:10%">Name</th>
            <th style="width:10%">Email</th>
            <th style="width:10%">Contact</th>
            <th style="width:10%">Address</th>
            <th style="width:10%">CreatedAt</th>
            <th style="width:10%">Action</th>
          </tr>
        </thead>
        <tbody id="leave_user_data">
          @foreach($leavedata->user as $user)
          <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->phone }}</td>
          <td>{{ $user->address }}</td>
          <td>{{ $user->created_at }}</td>
          <td> 
            <a href="#">
            <button class="btn btn-warning"><i class="fa fa-download"></i></button>
            </a> 
          </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@stop
