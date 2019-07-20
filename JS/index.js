$(document).ready(function(){

    load_business_data();

    function load_business_data(){
        $.ajax({
            url: 'fetch.php',
            type: 'POST',
            success:function(data){
          $('#business_list').html(data);
            }
            
        });
        
        
    }


    $(document).on('mouseenter','.rating', function(){

        let index = $(this).data('index');
        
        let business_id = $(this).data('business_id');

        remove_background(business_id);

        for (let count = 0; count <= index; count++) {
            $('#'+ business_id +'-'+ count).css('color','#ffcc00');             
        }
      
    });


    function remove_background(business_id){
        for (let count = 0; count <= 5; count++) {            
            $('#'+ business_id +'-'+ count).css('color','#ccc');              
        }
    }

    $(document).on('click','.rating', function(){
        let index = $(this).data('index');        
        let business_id = $(this).data('business_id');
        $.ajax({
            url:'insert_rating.php',
            method:'POST',
            data:{
                index:index,
                business_id:business_id
            },
            success:function(data){               

                if(data === "done"){
                    load_business_data();
                    alert('You have rated '+index+' out of 5');
                }else{
               alert("Ooops!!!!, Something is wrong");
                }

            }
        });


    });


  $(document).on('mouseleave', '.rating',function(){

    let index = $(this).data('index');
        
    let business_id = $(this).data('business_id');

    let rating = $(this).data('rating');

    remove_background(business_id);

    for (let count = 0; count <= rating; count++) {
       
        $('#'+ business_id +'-'+ count).css('color','#ffcc00');                 
    }

  });


//comment system integration




});