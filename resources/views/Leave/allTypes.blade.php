@extends('dashboard')

@section('content')

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
@if(session()->has('recover_success'))
<div class="alert alert-success">
    {{ session()->get('recover_success') }}
</div>
@endif
@if(session()->has('recover_failure'))
<div class="alert alert-success">
    {{ session()->get('recover_failure') }}
</div>
@endif
<div class="box">
    <div class="box-header">
      <h2>Leave Types</h2>
      <a href="{{url('create-policy')}}"><button class="btn btn-default" id="add_team">Add Type <i class="fa fa-plus"></i></button></a>
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
        	@foreach($leavedata as $data)
        <tbody>
        	<td>{{ $data->name }}</td>
            @if($data->status==1)
            <td><span class="label label-danger">Active</span></td>
            @else
            <td><span class="label label-danger">Inactive</span></td>
            @endif
        	<td style="width:75%">
        		<a href="{{url('policy',[$data->id])}}">
        			<button class="btn btn-primary"><i class="fa fa-eye"></i></button>
        		</a>
        		<a href="{{url('edit-policy',[$data->id])}}">
        			<button class="btn btn-warning"><i class="fa fa-edit"></i></button>
        		</a>
                @if($data->status==1)
                <a href="{{url('delete-policy',[$data->id])}}">
                    <button class="btn btn-success"><i class="fa fa-toggle-on"></i></button>
                </a>
                @else
                <a href="{{url('recover-policy',[$data->id])}}">
                    <button class="btn btn-danger"><i class="fa fa-toggle-off"></i></button>
                </a>
                @endif
        	</td>
        	@endforeach
        </tbody>
      </table>
        {!! $leavedata->links() !!}
    </div>
  </div>
@stop