<div id="leave_create" class="modal fade" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Please fill up the following :</h5>
      </div>
     
      <div class="modal-body text-center p-lg">
        {!!Form::open(['method'=>'post','url'=>'create-leave'])!!}
        <label for="start_date"> Start Date : </label>
        <input type="datetime-local" name="start_date" value="{{Date('Y-m-d')}}">
         </br>
         </br>
        <label for="end_date"> End Date : </label>
        <input type="datetime-local" name="end_date" value="{{Date('Y-m-d')}}">
        </br>
         </br>
        <select name="policy_id">
          @foreach($policydata as $policy)
          <option value="{{$policy->id}}">{{ $policy->name }}</option>
          @endforeach
        </select>
        </br>
        </br>
        <textarea name="comments" rows="10"></textarea>
        </br>
        </br>
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         <a href="#">
                 <b>{!! Form::button('Create',['class' => 'btn btn-primary','type' => 'submit','style' => 'width:94px;position:absolute;left:58%;top:92%' ]) !!}</b>
          </a>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>