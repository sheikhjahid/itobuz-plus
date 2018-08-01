<div id="upload" class="modal fade" data-backdrop="false">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
      	<h5 class="modal-title">Upload Profile Picture</h5>
      </div>
      <div class="modal-body text-center p-lg">
        {!!Form::open(['enctype'=>'multipart/form-data','method'=>'post','url'=>'uploadPicture'])!!}
        <span class="avatar w-96">
          @if(Auth::user()->image=='')
       <img src="{{URL::asset('images/default_dp.jpg')}}">
          @else
        <img src="{{URL::asset('images/'.Auth::user()->image)}}">
        @endif
        </span>
        <input type="file" style="size:68%;height:22px;width:87px;position:absolute;left:65%;top:77%" name="image">
      </div>
       <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
         <a href="#">
                 <b>{!! Form::button('Save',['class' => 'btn btn-primary','type' => 'submit','style' => 'width:94px;position:absolute;left:55%;top:79.7%' ]) !!}</b>
          </a>
      </div>
      {!!Form::close()!!}
    </div>
  </div>
</div>