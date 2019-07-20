<?php 

$connection = mysqli_connect("localhost", "root","", "ratingsystem");

$fetch_business_id = mysqli_query($connection,"SELECT * FROM business ");
     while($row = mysqli_fetch_assoc($fetch_business_id)){
      $business_id = $row['id'];
     }



$query = "SELECT * FROM comments WHERE business_comment_id = '$business_id' ORDER BY comment_id DESC";

$fetchArray = mysqli_query($connection, $query);

if (!$fetchArray) {
	die("Query failed". mysqli_error($connection));
}

while ($row = mysqli_fetch_array($fetchArray)) {

	echo "
	<div class='panel panel-danger ' >

	<div class='panel-heading' >
	By <b>{$row['comment_sender_name']}</b>
	<i > {$row['date']}</i>
	</div>
	<div class='panel-body'>
	<p class='lead'>{$row['comment_content']}</p>
	</div>

	<div class='panel-footer' align='right'>
	<button type='button' class='btn btn-primary' id='{$row['comment_id']}'>Reply</button>
	</div>

  
	
	</div>";

	

}





 ?>