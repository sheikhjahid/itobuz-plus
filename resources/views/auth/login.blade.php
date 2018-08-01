@include('layouts.header')

<div class="center-block w-xxl w-auto-xs p-y-md">
    <div class="navbar">
      <div class="pull-center">
        <div ui-include="'../views/blocks/navbar.brand.html'"></div>
      </div>
    </div>
    <div class="p-a-md box-color r box-shadow-z1 text-color m-a">
      <div class="m-b text-sm">
       <img src="{{ URL::asset('images/itobuz.png') }}" style="width:60px"><b> Itobuz Technologies Office+</b>
      </div>    
    <div class="box">  
      @if ( count( $errors ) > 0 )
              @foreach ($errors->all() as $error)
              <div class="alert alert-warning">{{ $error }}</div>
              @endforeach
              @endif
       {!!Form::model(['method'=>'POST', 'url' =>['home']])!!}

        <div class="md-form-group float-label">
        <b>{!! Form::label('Email','Email') !!}</b>
                 {!! Form::email ('email',null,['class'=>'md-input']) !!}
        </div>
        <div class="md-form-group float-label">
           <b>{!! Form::label('password','Password') !!}</b>
                 {!! Form::password ('password',['class'=>'md-input','type'=>'password']) !!}

        </div>      

       <b>{!! Form::button('Login',['class' => 'btn primary btn-block p-x-md','type' => 'submit','style' => 'width:230px' ]) !!}</b>

      </form>
  </div>
</div>
<center><a href="http://itobuz.com/">  www.itobuz.com  </a></center>

@include('layouts.footer')
