<div id="editUserDetails" class="modal fade" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Edit Profile Details</h5>
      </div>
      <div class="modal-body text-center p-lg">

          <div class="form-group">

            {!! Form::model(Auth::user(),['method'=>'post','url'=>['editProfileDetails',Auth::user()->id]])!!}
            <b>{!! Form::label('name','Name') !!}</b>
            {!! Form::text ('name',null,['class'=>'form-control','foo'=>'bar','value' => Auth::user()->name]) !!}
          </br>
          <b>{!! Form::label('name','Email') !!}</b>
          {!! Form::email ('email',null,['class'=>'form-control','foo'=>'bar','value' => Auth::user()->email]) !!}
        </br>
        <b>{!! Form::label('password','Password') !!}</b>
        {!! Form::password('password',['class'=>'form-control','foo'=>'bar','value' => Auth::user()->password]) !!}
          </br>
          </br>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">No</button>
         <a href="#">
               {!! Form::button('Yes',['class' => 'form-control','type' => 'submit','style' => 'height:40px;width:59px' ]) !!}
              </a>
      </div>
    </div><!-- /.modal-content -->
  </div>
</div>