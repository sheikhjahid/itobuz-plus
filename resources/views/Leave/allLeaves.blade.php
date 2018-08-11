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
      <button class="btn btn-default" id="modal_button" data-target="#leave_create" data-toggle="modal">Apply Leave <i class="fa fa-pencil"></i></button>
      @include('Modal.createLeaveModal')
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
            <th style="width:12%">Name</th>
            <th style="width:18%">Type</th>
            <th style="width:13%">Initialised</th>
            <th style="width:10%">Status</th>
            <th style="width:10%">Start-Date</th>
            <th style="width:10%">End-Date</th>
            <th style="width:13%">Action</th>

          </tr>
        </thead>
        	@foreach($leavedata as $data)
        <tbody>
        	<td>{{ $data->user->name }}</td>
            <td>{{ $data->policy->name }}</td>
            <td>{{ date('Y-m-d',strtotime($data->apply_date)) }}</td>
            @if($data->status==1)
            <td>{{ "Pending" }}</td>
            @elseif($data->status==0)
            <td>{{ "Rejected" }}</td>
            @else
            <td>{{ "Accepted" }}
            @endif    
            <td>{{ date('Y-m-d',strtotime($data->start_date)) }}</td>
            <td>{{ date('Y-m-d',strtotime($data->end_date)) }}</td>
        	<td style="width:75%">
        	  <button class="btn btn-primary" data-toggle="modal"><i class="fa fa-eye"></i></button>
        		<a href="#">
        			<button class="btn btn-warning"><i class="fa fa-download"></i></button>
        		</a>
        	</td>
        	@endforeach
        </tbody>
      </table>
        {!! $leavedata->links() !!}
    </div>
  </div>
@stop