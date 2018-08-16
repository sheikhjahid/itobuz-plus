<div id="rejected" class="tab-pane fade"> 
    <!-- <div class="table-responsive"> -->
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
        	@foreach($rejecteddata as $data)
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
            @if(Auth::user()->role_id==1||Auth::user()->role_id==2||Auth::user()->role_id==3||Auth::user()->role_id==4)
               <a href="javascript:void(0)" class="view-applied-leave-details"  data-id="<?php echo $data->id; ?>">
                      <button class="btn btn-success">
                     <i class="fa fa-eye"></i>
                   </button>
              </a>
              @else
              <a href="#">
                  <button class="btn btn-primary" data-toggle="modal" data-target="#applied"><i class="fa fa-eye"></i></button>
              </a>
              @endif
        		<a href="#">
        			<button class="btn btn-warning"><i class="fa fa-download"></i></button>
        		</a>
        	</td>
        	@endforeach
        </tbody>
      </table>
        {!! $rejecteddata->links() !!}
    </div>