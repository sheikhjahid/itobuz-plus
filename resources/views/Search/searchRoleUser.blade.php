<div class="container">
    <div class="row">
        <div class='col-sm-6'>
                <input type="hidden" value="{{$roledata->id}}" id="role"> 
                <form id="search_role_user">
                {!!Form::label('name','Name:',['style'=>'position:absolute;left:123%;bottom:-57%'])!!}
                {!!Form::text('name',null,['style'=>'position:absolute;left:132%;bottom:350%','id'=>'name','placeholder'=>'Search user by name..'])!!}

                {!! Form::button('Search',['class' => 'btn primary btn-block p-x-md','id'=>'search_button','type' => 'submit','style' => 'width:100px;position:absolute;left:165%;bottom:329%;height:28px' ]) !!}

               </form>
        </div>
    </div>
</div>