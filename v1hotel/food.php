<?php
include'connect.php';
//index.php
$keyword = 'food';

function make_query_food($connect)
{
 $query = "SELECT food_id,food_name,food_title,food_description FROM food";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators_food($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query_food($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show_food" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show_food" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides_food($connect)
{
 $output = '';
 $count = 0;
 $result = make_query_food($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active mr-0 ml-0 pr-1 pl-1" >';
  }
  else
  {
   $output .= '<div class="item" > ';
  }
  $output .='
   <img src="data:image/jpeg;base64,'.base64_encode($row["food_name"]).'"  class="img-responsive" width="450" height="200" style="position:center;"/>
   <div class="carousel-caption">
    <h3>'.$row["food_title"].'</h3>
    <h3 style="background-color:red;border-radius:50%">'.$row["food_description"].'<h3>
   </div>
  </div>
  ';
  $count = $count + 1;
 }
 return $output;
}

?>
<!DOCTYPE html>
<html>
 <head>
  <title></title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style>
    
  </style>
 </head>
 <body>
  <br />
  <div class="container w-100 " style="" >
   
   <div id="dynamic_slide_show_food" class="carousel slide" data-ride="carousel" style="position: center;min-width: 100%">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators_food($connect); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides_food($connect); ?>
     <form method="post" style="margin-left: 40%" action="s_search.php?all_key=<?php echo $keyword; ?>">
       <input type="submit" name="food" class="btn-success" value="Book Now">
     </form>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show_food" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show_food" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
 </body>
</html>
