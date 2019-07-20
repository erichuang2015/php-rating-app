<?php 

$connection = mysqli_connect("localhost", "root","", "ratingsystem");



$query = "SELECT * FROM business ORDER BY id DESC";

$statement = mysqli_query($connection,$query);

$result = [];

while ($row = mysqli_fetch_array($statement)) {

  $result[] = $row;
}

	




$output = "";

foreach ($result as $row) {

    $rating = count_rating($row['id'], $connection);

    $color = "";

    $output .= '
    <div class="main">
     <h2 class="text-primary">' .$row["business_name"].' </h2>

     <img  src="IMG/work/'.$row["product_image"].' "   class="img img-fluid img-thumbnail" width="100" height="100" alt="Images to display"/>
     <p class="lead">'.$row['address'].'</p>
     <label>'.$row['product'].'</label><br>

     <ul class="list-inline "  data-rating = "'.$rating.'" title ="Average rating - "'.$rating.'" ">
     ';
    for($count = 1;$count <= 5; $count++ ){

            if( $count <= $rating){

                $color = "color:#ffcc00;";

            }else{

                $color = "color:#ccc;";

            }
            $output .= ' <li title = "Rating is: '.$count.'"  id = "'.$row["id"].'-'.$count.'" 
            data-index = "'.$count.'" data-business_id ="'.$row["id"].'" data-rating="'.$rating.'" 
            class="rating" style="cursor:pointer;'.$color.' font-size:16px">&#9733;</li>
                ';
                }
                
             $output .= '
             </ul> 
             <h3 class="font-weight-bold bg-primary " style="padding:10px">The current rating is : <span> '.$rating.'</span></h3>
           <br>
           <h4>Do you Have Some Reason</h4>
           <br>
             <form  method="POST" id="comment_form" style="margin:5px 30px 5px 30px;">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Enter Name" name="comment_name" id="comment_name">
            </div>

            <div class="form-group">
                <textarea  type="text" name="comment_content" id="comment_content" placeholder="Enter comment"  rows="3" class="form-control"></textarea>
            </div>
            <div class="form-group">

            <input type="hidden" name="comment_id" id="comment_id" value="0" />

            <input type="submit" name="submit" id="submit" value="submit" class="btn btn-primary">
            </div>
        </form><br>

     
        <div id="comment_display" style="padding:1px 30px 1px 30px"></div>

         </div>


             <hr>

             ';   

    # code...
}

  echo $output;

function count_rating($business_id, $connection){

     $output = 0;     

     $query = "SELECT AVG(rating) as rating FROM ratings WHERE business_id = ".$business_id."   ";

     $statement = mysqli_query($connection,$query);

     $result = [];

     while ($row = mysqli_fetch_array($statement)) {
     $result[] = $row;
     }

     $total_row = mysqli_num_rows($statement);

    //  $total_row = $statement->rowCount();
     
     if ($total_row > 0) {

         foreach ($result as $row) {

            $output = round($row['rating']);

         }
     }

     return $output;

}


 ?>