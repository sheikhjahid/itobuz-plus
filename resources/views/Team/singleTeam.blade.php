@extends('dashboard')

@section('content')

<div class="box">

  <div class="item">

    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">

          <div class="clear m-b">
            <h3 class="m-0 m-b-xs">{{ $teamdata->name}}</h3>
            <p class="text-muted"><strong>Team-Id : </strong><span class="m-r">{{ $teamdata->id}}</span></p>

          </div>
        </div>

        <div class="col-sm-5">
          <h3 class="text-md profile-status">Status</h3>
          @if($teamdata->status == 0)
          <h4 class="active_inactive">{{ "Inactive" }}</h4>
          @else
          <h4 class="active_inactive">{{ "Active" }}</h4>
          @endif
        </div>  
      </div>
    </div>

    <div class="table-responsive">
      <center><h2>Associated User for {{ $teamdata->name }}</h2></center>
        @include('Search.searchTeamUser')
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
            <th style="width:10%">Status</th>
          </tr>
        </thead>
        <tbody id="search_user">
          @foreach($teamdata->user as $user)
          <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->phone }}</td>
          <td>{{ $user->address }}</td>
          @if($user->status==1)
          <td>{{ "Active" }}</td>
           @else
           <td>{{ "Inactive" }}</td>
            @endif
        </tbody>
      </tr>
          @endforeach
      </table>
    </div>

  </div>
</div>
@stop
