<?php
//index.php
$keyword = 'citylife';
$connect = mysqli_connect("localhost", "root", "", "mytravaly");
function make_query_city($connect)
{
 $query = "SELECT * FROM property_details WHERE keyword = 'citylife'";
 $result = mysqli_query($connect, $query);
 return $result;
}

function make_slide_indicators_city($connect)
{
 $output = ''; 
 $count = 0;
 $result = make_query_city($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '
   <li data-target="#dynamic_slide_show_city" data-slide-to="'.$count.'" class="active"></li>
   ';
  }
  else
  {
   $output .= '
   <li data-target="#dynamic_slide_show_city" data-slide-to="'.$count.'"></li>
   ';
  }
  $count = $count + 1;
 }
 return $output;
}

function make_slides_city($connect)
{
 $output = '';
 $count = 0;
 $result = make_query_city($connect);
 while($row = mysqli_fetch_array($result))
 {
  if($count == 0)
  {
   $output .= '<div class="item active mr-0 ml-0 pr-1 pl-1" style="" >';
  }
  else
  {
   $output .= '<div class="item mr-0 ml-0 pr-1 pl-1" > ';
  }
  $output .='
   <img src="data:image/jpeg;base64,'.base64_encode($row["property_image"]).'" width="450" height ="200"  class="img-responsive" style="position:center;" />
   
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

   <div id="dynamic_slide_show_city" class="carousel slide" data-ride="carousel" style="position: center;min-width: 100%">
    <ol class="carousel-indicators">
    <?php echo make_slide_indicators_city($connect); ?>
    </ol>

    <div class="carousel-inner">
     <?php echo make_slides_city($connect); ?>
     <form method="post" style="margin-left: 40%" action="s_search.php?all_key=<?php echo $keyword; ?>">
       <input type="submit" name="city" class="btn-success" value="Book Now">
     </form>
    </div>
    <a class="left carousel-control" href="#dynamic_slide_show_city" data-slide="prev">
     <span class="glyphicon glyphicon-chevron-left"></span>
     <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#dynamic_slide_show_city" data-slide="next">
     <span class="glyphicon glyphicon-chevron-right"></span>
     <span class="sr-only">Next</span>
    </a>

   </div>
  </div>
 </body>
</html>
