@extends('dashboard')

@section('content')

@if(session()->has('upload_success'))
<div class="alert alert-success">
  {{ session()->get('upload_success') }}
</div>
@endif
@if(session()->has('upload_error'))
<div class="alert alert-success">
  {{ session()->get('upload_error') }}
</div>
@endif
<div class="item">
    <div class="item-bg">
      <img class="background" src="{{URL::asset('images/profile-background.JPG')}}">
    </div>
    <div class="p-a-md">
      <div class="row m-t">
        <div class="col-sm-7">
          <a href class="pull-left m-r-md">
            <span class="avatar w-96">
            	@if(Auth::user()->image=='')
              <img src="{{URL::asset('images/default_dp.jpg')}}">
              @else
               <img src="{{URL::asset('images/'.Auth::user()->image)}}">
               @endif
              <i class="on b-white"></i>
            </span>
          </a>
          <div class="clear m-b">
            <h3 class="m-0 m-b-xs">{{Auth::user()->name}}</h3>
            <p class="text-muted"><span class="m-r">{{ Auth::user()->team->name }}</span> <small><i class="fa fa-map-marker m-r-xs"></i>{{ Auth::user()->address }}</small></p>
            <div class="block clearfix m-b">
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-facebook"></i>
                <i class="fa fa-facebook indigo"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-twitter"></i>
                <i class="fa fa-twitter light-blue"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-google-plus"></i>
                <i class="fa fa-google-plus red"></i>
              </a>
              <a href="" class="btn btn-icon btn-social rounded white btn-sm">
                <i class="fa fa-linkedin"></i>
                <i class="fa fa-linkedin cyan-600"></i>
              </a>
            </div>
          <button class="btn btn-primary" data-toggle="modal"  data-target="#upload">Upload Picture</button>
            @include('Upload.uploadPicture')
          </div>
        </div>
        <div class="col-sm-5">
          <p class="text-md profile-status">I am feeling good!</p>
          <button class="btn btn-sm white" data-toggle="collapse" data-target="#editor">Edit</button>
          <div class="collapse box m-t-sm" id="editor">
            <textarea class="form-control no-border" rows="2" placeholder="Type something..."></textarea>
          </div>
        </div>
      </div>
    </div>
  </div>


@stop