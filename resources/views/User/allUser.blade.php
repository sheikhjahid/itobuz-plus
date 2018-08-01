@extends('dashboard')

@section('content')

<div class="box">
    <div class="box-header">
      <h2>User Table</h2>
      @include('Search.searchUserForm')
    </div>
    @if(session()->has('update_success'))
        <div class="alert alert-success">
            {{ session()->get('update_success') }}
        </div>
        @endif
        @if(session()->has('update_failure'))
        <div class="alert alert-success">
            {{ session()->get('update_failure') }}
        </div>
        @endif
        @if(session()->has('delete_success'))
        <div class="alert alert-success">
            {{ session()->get('delete_success') }}
        </div>
        @endif
        @if(session()->has('delete_failure'))
        <div class="alert alert-success">
            {{ session()->get('delete_failure') }}
        </div>
        @endif
        @if(session()->has('recovery_success'))
        <div class="alert alert-success">
            {{ session()->get('recovery_success') }}
        </div>
        @endif
        @if(session()->has('recovery_failure'))
        <div class="alert alert-success">
            {{ session()->get('recovery_failure') }}
        </div>
        @endif
        @if(session()->has('search_failure'))
        <div class="alert alert-success">
            {{ session()->get('search_failure') }}
        </div>
        @endif

    <div class="table-responsive">
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
            <th style="width:15%">Name</th>
            <th style="width:-1%"></th>
            <th style="width:16%">Email</th>
            <th style="width:2%">Address</th>
            <th style="width:5%">Contact</th>
            <th style="width:13%">Team</th>
            <th style="width:12%">Role</th>
            <th style="width:7%">Status</th>
            <th style="width:66%">Action</th>
          </tr>
        </thead>
        	@foreach($userdata as $data)
        <tbody>
        	<td>{{ $data->name }}</td>
            <td>    
            @if($data->image=='')
            <img src="{{ URL::asset('images/default_dp.jpg') }}" style="width:30px;height:30px" class="w-40 img-circle" >
            @else
            <img src="{{ URL::asset('images/'.$data->image) }}" style="width:30px;height:30px" class="w-40 img-circle" >
            @endif
            </td>
        	<td>{{ $data->email }}</td>
        	<td>{{ $data->address }}</td>
        	<td>{{ $data->phone }}</td>
        	<td>{{ $data->team->name }}</td>
        	<td>{{ $data->role->name }}</td>
        	@if($data->status==1)
        	<td>{{ "Active" }}</td>
        	 @else
        	 <td>{{ "Inactive" }}</td>
        	  @endif
        	<td style="width:75%">
        		<a href="{{ url('/users',[$data->id]) }}">
        			<button class="btn btn-primary"><i class="fa fa-eye"></i></button>
        		</a>
        		<a href="{{ url('/edit-users',[$data->id]) }}">
        			<button class="btn btn-warning"><i class="fa fa-edit"></i></button>
        		</a>
                @if($data->status==1)
        		<a href="{{ url('/delete-users',[$data->id]) }}">
        			<button class="btn btn-danger activated"><i class="fa fa-toggle-on"></i></button>
        		</a>
                @else
                <a href="{{ url('/recover-users',[$data->id]) }}">
                    <button class="btn btn-danger"><i class="fa fa-toggle-off "></i></button>
                </a>
                @endif
        	</td>
        </tbody>
        	@endforeach
      </table>
    </div>
  </div>

@stop