jQuery(document).ready(function()
{

	var pathparts = location.pathname.split('/');
    if (location.host == 'localhost') 
     {
       var url = location.origin + '/' + pathparts[1].trim('/') + '/'; // http://localhost/rapxrnb/
     }

    jQuery('#search_user').submit(function(e){

    e.preventDefault();

    var name = document.getElementById('name').value;
    var id = document.getElementById('team').value;
   
  	$value=jQuery(this).val();
    console.log(name);
  	jQuery.ajax({

  	  type : 'post',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
  		url :  'http://localhost/office+/public/search-team-user',
  		data: {'name':name,'id':id},

        success: function (response) 
        {
          var trHTML = '';
        	jQuery('#search').html(response);
        	$.each(response, function (key,value) {
        		trHTML += 
        		'<tr><td>' + value.name + 
        		'</td><td>' + value.email + 
        		'</td><td>' + value.phone + 
        		'</td><td>' + value.address + 
        		'</td><td>' + value.created_at + 
        		'</td></tr>';     
        	});

        	$('#search').append(trHTML);
        }
  });
});

       jQuery('#search_role_user').submit(function(e){

    e.preventDefault();

    var name = document.getElementById('name').value;
    var id = document.getElementById('role').value;
   
    $value=jQuery(this).val();
    console.log(name);
    jQuery.ajax({

      type : 'post',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url :  'http://localhost/office+/public/search-role-user',
      data: {'name':name,'id':id},

        success: function (response) 
        {
          var trHTML = '';
          jQuery('#user_data').html(response);
          $.each(response, function (key,value) {
            trHTML += 
            '<tr><td>' + value.name + 
            '</td><td>' + value.email + 
            '</td><td>' + value.phone + 
            '</td><td>' + value.address + 
            '</td><td>' + value.created_at + 
            '</td></tr>';     
          });

          $('#user_data').append(trHTML);
        }
  });
});


    jQuery('#search_leave_user').submit(function(e){

    e.preventDefault();

    var name = document.getElementById('name').value;
    var id = document.getElementById('leave').value;
   
    $value=jQuery(this).val();
    console.log(name);
    jQuery.ajax({

      type : 'post',
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url :  'http://localhost/office+/public/search-leave-user',
      data: {'name':name,'id':id},

        success: function (response) 
        {
          var trHTML = '';
          jQuery('#leave_user_data').html(response);
          $.each(response, function (key,value) {
            trHTML += 
            '<tr><td>' + value.name + 
            '</td><td>' + value.email + 
            '</td><td>' + value.phone + 
            '</td><td>' + value.address + 
            '</td><td>' + value.created_at + 
            '</td></tr>';     
          });

          $('#leave_user_data').append(trHTML);
        }
  });
});

});