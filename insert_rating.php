<?php 

$connection = mysqli_connect("localhost", "root","", "ratingsystem");

if(isset($_POST['index'], $_POST['business_id'])){

    $businessID = $_POST['business_id'];

    $ratedID    = $_POST['index'];


    $query = "INSERT INTO ratings (business_id, rating) VALUES ('$businessID','$ratedID')";

    $statement = mysqli_query($connection, $query);  
    
    if(isset($statement)){

        echo "done";
    }
 }



?>