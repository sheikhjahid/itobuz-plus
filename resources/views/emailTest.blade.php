{!!Form::open(['method'=>'post','url'=>'send-mail'])!!}
	<?php 
	$i=0;
	foreach($userdata as $d) { ?>
		<input type="checkbox" name="email[{{$i}}]" placeholder ="Enter an answer" value="{{ $d->email }}">{{$d->email}}
	<?php 
	$i++;
} ?>
	<input type="submit" value="send">
</form>