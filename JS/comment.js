$(document).ready(function() {

	load_comment();

  $(document).on('submit','#comment_form', function(event){


  	event.preventDefault();

  	 var form_data = $(this).serialize();

  	 var url = 'add_comment.php';

  	 $.post(url,  form_data, function(data) {

  	 alert(data);

  	 });

  }); 

  

   function load_comment(){
   	$.ajax({
   		url: 'fetch_comment.php',
   		method:'POST',
   		success:function(data){

          $("#comment_display").html(data);

   		}
   	});
   	
   	
   	
   }


	
});