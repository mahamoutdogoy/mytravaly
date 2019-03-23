<link rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<?php
  session_start();
  $session_user=$_SESSION['user']['userid'];
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


   <script>
  function showUser(str1) {

  var property=document.getElementById('property').value;
  alert(property);
  var room=document.getElementById('room').value;
  //document.getElementById('t2').style.display = 'none';
  var str= str1.options[str1.selectedIndex].innerHTML;
  var room=document.getElementById('room').value;
  alert(room);
  //var arr1=room.split("-");
  //var room_id=arr1[0];
var meal_plan="hii";
  //alert(room_id);
    if (str == "") {
        document.getElementById("room_div").innerHTML = "";
        return;
    } 
    else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("room_div").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","load_photos.php?q="+room+"&p="+meal_plan+"&r="+property,true);
        xmlhttp.send();
    }
}
</script>


</head>

<div class="row content">
  <div class="col-md-3">
    <br><br>
    <?php include 'sidebar.php' ?>
  </div>
<div class="col-md-9">

<body>
  <br><br>
  <?php include 'propertymenus.php';?>
    <form action="" method="post" enctype="multipart/form-data">
           
        <div class="mt-2" >
            
           &emsp; <table cellspacing="10" cellpadding="10" >
              <tr>
                <td>
                Select Property
                </td>
                <td>
                  <select name="property" id="property" onchange="this.form.submit()" style="width:270px;border-radius: 1rem;text-align: center;height: 35px" required>
                      <option value="0" selected disabled>--Select--</option>
                          <?php
                              $query = "SELECT * FROM propertydetails where user_id='$session_user' group by property_id";
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
              <select name="room" id="room" onchange="showUser(this)" style="width:270px;border-radius: 1rem;text-align: center;height: 35px" required>
                <option value="0">--Select--</option>
                <?php
                if(isset($_POST['property']))
                {
                        $p=$_POST['property'];
                        echo $p;
                          $query = "SELECT * FROM rooms_detail where property_id='$p' group by room_id";
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

        require_once('Property_DB.php');
    }

        
        
?>
<div id="room_div">
  Please Select your property and room for displaying pictures
        </div>
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

