<div id="leave_create" class="modal fade" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Please fill up the following :</h5>
      </div>
     
      <div class="modal-body text-center p-lg">
        {!!Form::open(['method'=>'post','url'=>'create-leave'])!!}
        <label for="start_date"><b> Start Date : </b></label>
        <input type="text" name="start_date" id="start_date">
         </br>
         </br>
        <label for="end_date"><b> End Date : </b></label>
        <input type="text" name="end_date" id="end_date">
        </br>
         </br>
         <label for="leave_policy"><b> Select Type : </b></label>
        <select name="policy_id" class="policy_id">
          @foreach($policydata as $policy)
          <b><option class="policy_select" value="{{$policy->id}}">{{ $policy->name }}</option></b>
          @endforeach
        </select>
        </br>
        </br>
        <label for="comments"><b>Reason </b></label>
        </br>
        <textarea name="comments" rows="10" cols="30" placeholder="Enter your message here..">
          Dear Sir,
                    This is to inform that i want to take a leave for the above dates due to {your_reason}.

        </textarea>
        </br>
        </br>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         <a href="#">
                 <b>{!! Form::button('Create',['class' => 'btn btn-primary','type' => 'submit','style' => 'width:94px;position:absolute;left:58%;top:90.7%' ]) !!}</b>
          </a>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>