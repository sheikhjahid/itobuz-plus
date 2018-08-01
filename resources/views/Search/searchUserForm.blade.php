
{!!Form::open(['method'=>'post','url'=>'search-users'])!!}
{!! Form::text('key',null,['class'=>'form-control','foo'=>'bar','placeholder'=>'Search user here..','style' => 'position:absolute;left:64%;width:180px']) !!}
<b>{!! Form::button('Search',['class' => 'form-control','type' => 'submit','style' => 'position:absolute;left:81%;width:150px' ]) !!}</b>
{!!Form::close()!!}
</br>


