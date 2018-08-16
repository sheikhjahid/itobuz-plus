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

jQuery('#start_date, #end_date').datetimepicker({
       
    lang: 'en',
    format: 'Y-m-d h:i',
    minDate: new Date(),
    beforeShowDay: nonWorkingDays        
});

function nonWorkingDays(date) {

            var day = date.getDay(), Sunday = 0, Monday = 1, Tuesday = 2, Wednesday = 3, Thursday = 4, Friday = 5, Saturday = 6;
            var week = 0 | date.getDate() / 7; 
            
            if(week==2 || week==4)
            {
              if(day == 6)
              {
                 return [false];
              }//end of inner-if
            }//end of if

            if (day == 0)
            {
                return [false];
            }//end of if

         return [true];   

  }

$('.view-applied-leave-details').on('click',function()
{
       var leave_id=$(this).data('id');
       var path=url+'showLeaveById';
       var param={leave_id:leave_id};
       $.post( path, param, function( data ) 
       {
        console.log(data);
        var res=JSON.parse(data);

        $('#update_leave_applied .start_date').html(res.leave_type);
        $('#update_leave_applied .end_date').html(res.end_date);
        $('#update_leave_applied .apply_date').html(res.apply_date);
        $('#update_leave_applied .comments').html(res.comments);
        $('#update_leave_applied').modal();

       });
});

});