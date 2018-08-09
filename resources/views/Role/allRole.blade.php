@extends('dashboard')

@section('content')

<div class="box">
    <div class="box-header">
      <h2>Role Table</h2>
      <a href="{{url('create-team-form')}}"><button class="btn btn-default" id="add_team">Add Role <i class="fa fa-plus"></i></button></a>
    </div>
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
            <th style="width:30%">Name</th>
            <th style="width:30%">Status</th>
            <th style="width:40%">Action</th>
          </tr>
        </thead>
        	@foreach($roledata as $data)
        <tbody>
        	<td>{{ $data->name }}</td>
        	@if($data->status==1)
        	<td><span class="label label-danger">Active</span></td>
        	 @else
        	 <td><span class="label label-danger">Inactive</span></td>
        	  @endif
        	<td style="width:75%">
        		<a href="{{url('roles',[$data->id])}}">
        			<button class="btn btn-primary"><i class="fa fa-eye"></i></button>
        		</a>
        		<a href="#">
        			<button class="btn btn-warning"><i class="fa fa-edit"></i></button>
        		</a>
                @if($data->status==1)
        		<a href="#">
        			<button class="btn btn-success"><i class="fa fa-toggle-on"></i></button>
        		</a>
                @else
                <a href="#">
                    <button class="btn btn-danger"><i class="fa fa-toggle-off"></i></button>
                </a>
                @endif
        	</td>
        </tbody>
        	@endforeach
      </table>
    </div>
  </div>
@stop