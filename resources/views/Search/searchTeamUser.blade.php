<div class="container">
    <div class="row">
        <div class='col-sm-6'>
            
                <!-- {!!Form::open(['id'=>'search_user','method'=>'POST','url'=>'/searchUser'])!!} -->
                <input type="hidden" value="{{$teamdata->id}}" id="team"> 
                <form id="search_user">
                {!!Form::label('name','Name:',['style'=>'position:absolute;left:55%;bottom:-57%'])!!}
                {!!Form::text('name',null,['style'=>'position:absolute;left:64%;bottom:-57%','id'=>'name','placeholder'=>'Search user by name..'])!!}

                {!! Form::button('Search',['class' => 'btn primary btn-block p-x-md','id'=>'search_button','type' => 'submit','style' => 'width:100px;position:absolute;left:165%;bottom:-671%' ]) !!}

               </form>
        </div>
    </div>
</div>