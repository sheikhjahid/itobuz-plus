<div id="role_create" class="modal fade" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Create Role</h5>
      </div>
     
      <div class="modal-body text-center p-lg">
        {!!Form::open(['method'=>'post','url'=>'create-roles'])!!}
        <label for="team_name"> Enter name </label>
        <input type="text" name="name">
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         <a href="#">
                 <b>{!! Form::button('Create',['class' => 'btn btn-primary','type' => 'submit','style' => 'width:94px;position:absolute;left:58%;top:71.7%' ]) !!}</b>
          </a>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>