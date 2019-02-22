<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
<?php include 'propertymenus.php';?>

<?php
include 'Property_DB.php';
?>

<!DOCTYPE html>

<html>

<head>
   
    

<!-- using jqery request to change the image type in imgtypeupdate.php page -->

    <script>

           $(document).ready(function(){

           $('.type').change(function(){

               //Selected value

               var inputValue = $(this).val();

               var string1=inputValue.split("/");

               var imageid=string1[0];

               var imagetype=string1[1];

              // var ename=string1[2];
              alert("You request to change the Image type to: "+imagetype);

               $.post('imgtypeupdate.php', {imgid:imageid,imgtype:imagetype}, function(data){
  
                 alert('Image type Updated Successfully');

                 //  location.reload();

              });

           });

       });

   </script>

</head>

<div class="row">
  <div class="col-md-3">
    <br><br><br>
    <?php include 'sidebar.php' ?>
  </div>
<div class="col-md-9">

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <br>    
        <div class="mt-5" style="background-color: #ff6f61;width: 1230">
            <br>
           &emsp; <table cellspacing="5" cellpadding="12" >
              <tr>
                <td>
                Select Property
                </td>
                <td>
                  <select name="property" id="property" onchange="this.form.submit()" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" required>
                      <option value="0" selected disabled>--Select--</option>
                          <?php
                              $query = "SELECT * FROM propertydetails where user_id='abhi' group by property_id";
                              $result = mysqli_query($con,$query);
                              while($row=mysqli_fetch_array($result)){                                                 
                                echo "<option value=".$row['property_id'].">".$row['property_name']."</option>";
                              }
                          ?>

                    </select>
                </td>
              </tr>

                <tr>
              <td style="text-align: left;">
              Select Room
            </td>
            
            <td>
              <select name="room" id="room" onchange="" style="width:250px;border-radius: 1rem;text-align: center;height: 35px" required>
                <option value="0">--Select--</option>
                <?php
                if(isset($_POST['property']))
                {
                        $p=$_POST['property'];
                        echo $p;
                          $query = "SELECT * FROM rooms_details where property_id='$p'";
                            $result = mysqli_query($con,$query);
                            while($row=mysqli_fetch_array($result)){                                
                            echo "<option value=".$row['room_id'].">".$row['room_name']."</option>";
                            }
                        
                      }
                  ?>
                      
                
              </select>
              
              </td>
            </tr>

              <tr>
                <td align="center" colspan="2">
                  <input type="file" name="pimage" id="pimage" class="btn btn-success" required accept=".jpeg,.png,.jpg">
                </td>
              </tr>
              <tr>
                <td align="center" colspan="2">
                  <input type="submit" name="upload" id="s1" class="btn btn-success" value="upload" style="border-radius:2rem">
                </td>
              </tr>
            </table>
           
             <span class="text-black">&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;  <b>Jpeg,Png Recommended<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; Please Keep Size Less Than 1 MB</b></span><br>
        
             <br>
            <br>
        </div>
    </form>

</body>

</html>

<?php

    if(isset($_POST['upload']))

    {
        $image=addslashes(file_get_contents($_FILES['pimage']['tmp_name']));
        
        $r=mysqli_query($con,"insert into images(image,image_type) values ('$image','--Select--')");
        $rowSQL = mysqli_query($con, "SELECT MAX( image_id) AS image_id FROM `images`;" );
        $row = mysqli_fetch_array( $rowSQL );
        $image_id = $row['image_id'];
        $property_id=$_POST['property'];
        $room_id=$_POST['room'];
         $p=mysqli_query($con,"insert into mapping_images(property_id,room_id,image_id) values ('$property_id','$room_id','$image_id')");

    }

        
        $query=mysqli_query($con,"select * from images");
        echo "<table  cellspacing='15px' id='t1'>";   
        start:
            echo "<tr>";  
            $i=1;
            while($row=mysqli_fetch_array($query))
            {    
                if($i <= 2)
                {
                    $i=$i+1;
                    echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' style='width:315px;height:300px;'/>

                     <br>
                     <hr>";

                            if($row['image_type'] == "--Select--"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom'>Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }


                          if($row['image_type'] == "Guestroom"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' selected>Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                            if($row['image_type'] == "Bathroom"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom' selected>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Living Area"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area' selected>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['image_type'] == "Hotel Front"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front' selected>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                  if($row['image_type'] == "Exterior"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' selected>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  
                                  if($row['image_type'] == "In Room Kitchen"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' selected>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['image_type'] == "Terrace"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace' selected>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Restaurant"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant' selected>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Reception"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception' selected>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                   if($row['image_type'] == "In Room Kitchen Dining"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'  selected>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                    /*<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                        <option selected disabled"

                        "<option value='".$row['image_id']."/Guestroom'>Guestroom</option>
                        <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                        <option value='".$row['image_id']."/Living Area'>Living Area</option>
                         <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                        <option value='".$row['image_id']."/Exterior'>Exterior</option>
                        <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen Kitchen</option>
                        <option value='".$row['image_id']."/Terrace'>Terrace/Patio</option>
                        <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                        <option value='".$row['image_id']."/Reception'>Reception</option>
                        <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                    </select></td>";*/

             }    

            else
            {
                echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' style='width:315px;height:300px;'/>
               
                <br>
                <hr>";
                

                     if($row['image_type'] == "--Select--"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom'>Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }


                          if($row['image_type'] == "Guestroom"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' selected>Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                            if($row['image_type'] == "Bathroom"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom' selected>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Living Area"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area' selected>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['image_type'] == "Hotel Front"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front' selected>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior'>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                  if($row['image_type'] == "Exterior"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' selected>Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  
                                  if($row['image_type'] == "In Room Kitchen"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' selected>In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['image_type'] == "Terrace"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace' selected>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Restaurant"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant' selected>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['image_type'] == "Reception"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception' selected>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                   if($row['image_type'] == "In Room Kitchen Dining"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['image_id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['image_id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['image_id']."/Living Area'>Living Area</option>
                                    <option value='".$row['image_id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['image_id']."/Exterior' >Exterior</option>
                                    <option value='".$row['image_id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['image_id']."/Terrace'>Terrace</option>
                                    <option value='".$row['image_id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['image_id']."/Reception'>Reception</option>
                                    <option value='".$row['image_id']."/In Room Kitchen Dining'  selected>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }



                goto start;
            }


        }

        echo "</tr>";
        echo "</table>";


?>
</div>
</div>

<script type="text/javascript">
 
  document.getElementById('property').value = "<?php echo $_POST['property'];?>";
  document.getElementById('room').value = "<?php echo $_POST['room'];?>";

</script>


<!--<script type="text/javascript">
  
var uploadField = document.getElementById("pimage");

uploadField.onchange = function() {
    if(this.files[0].size > 500){
       alert("File is too big!");
       this.value = "";
    };
};

</script>-->