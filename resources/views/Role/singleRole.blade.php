@extends('dashboard')

@section('content')

<div class="box">

  <div class="item">

    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">

          <div class="clear m-b">
            <h3 class="m-0 m-b-xs">{{ $roledata->name}}</h3>
            <p class="text-muted"><strong>Role-Id : </strong><span class="m-r">{{ $roledata->id}}</span></p>
          </div>
        </div>

        <div class="col-sm-5">
          <h3 class="text-md profile-status">Status</h3>
          @if($roledata->status == 0)
          <h4 class="active_inactive">{{ "Inactive" }}</h4>
          @else
          <h4 class="active_inactive">{{ "Active" }}</h4>
          @endif
        </div>  
      </div>
    </div>

    <div class="table-responsive">
      <left><h2>Associated User for {{ $roledata->name }}</h2></left>
      @include('Search.searchRoleUser')
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
          </tr>
        </thead>
        <tbody id="user_data">
          @foreach($roledata->user as $user)
          <tr>
          <td>{{ $user->name }}</td>
          <td>{{ $user->email }}</td>
          <td>{{ $user->phone }}</td>
          <td>{{ $user->address }}</td>
          <td>{{ $user->created_at }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>

  </div>
</div>
@stop
