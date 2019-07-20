<?php 

$connection = mysqli_connect("localhost", "root","", "ratingsystem");

$error = '';


     if (isset($_POST['comment_content']) && isset($_POST['comment_name'])) {
     	
      $comment_name = $_POST['comment_name']; 
      $comment_content = $_POST['comment_content']; 
     $comment_id = $_POST['comment_id']; 

     $fetch_business_id = mysqli_query($connection,"SELECT * FROM business ");
     while($row = mysqli_fetch_assoc($fetch_business_id)){
      $business_comment_id = $row['business_comment_id'];
     }




        
    if (!empty($comment_name) || !empty($comment_content)) {
    	
    
	  $query = "INSERT INTO comments (business_comment_id, comment_content, comment_sender_name) VALUES ('$comment_id','$comment_content', '$comment_name')";

	  $insertQuery = mysqli_query($connection, $query);



	  if ($insertQuery) {
		header('Location: index.php');
		echo "Thanks for your FeedBack we are glad";
		
	}else{

		echo " No comment Added";

	}

    }else{
 
	 echo "Comment Name and Content are required";
   }


}


 ?>