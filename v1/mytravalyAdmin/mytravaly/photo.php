<?php include 'propertymenus.php';?>

<!DOCTYPE html>

<html>

<head>
   
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

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

<body>

    <form action="" method="post" enctype="multipart/form-data">
        <br>    
        <div class="mt-5" style="background-color: #ff6f61;width: 1230">
            <br>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; <input type="file" name="pimage" class="btn btn-success col-lg-4" required><br><br>
            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<input type="submit" name="upload" id="s1" class="btn btn-success" value="upload" style="border-radius:2rem"><br><br>
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
        $con=mysql_connect("localhost","root","");
        mysql_select_db("trial",$con);
        $r=mysql_query("insert into photo(img,type) values ('$image','--Select--')");

    }

        $con=mysql_connect("localhost","root","");
        mysql_select_db("trial",$con);
        $query=mysql_query("select * from photo");
        echo "<table  cellspacing='15px' id='t1'>";   
        start:
            echo "<tr>";  
            $i=1;
            while($row=mysql_fetch_array($query))
            {    
                if($i <= 3)
                {
                    $i=$i+1;
                    echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' style='width:315px;height:300px;'/>

                     <br>
                     <hr>";

                            if($row['type'] == "--Select--"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom'>Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }


                          if($row['type'] == "Guestroom"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' selected>Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                            if($row['type'] == "Bathroom"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom' selected>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['type'] == "Living Area"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area' selected>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['type'] == "Hotel Front"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front' selected>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                  if($row['type'] == "Exterior"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' selected>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  
                                  if($row['type'] == "In Room Kitchen"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' selected>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['type'] == "Terrace"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace' selected>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['type'] == "Restaurant"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant' selected>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['type'] == "Reception"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception' selected>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                   if($row['type'] == "In Room Kitchen Dining"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'  selected>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                    /*<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                        <option selected disabled"

                        "<option value='".$row['id']."/Guestroom'>Guestroom</option>
                        <option value='".$row['id']."/Bathroom'>Bathroom</option>
                        <option value='".$row['id']."/Living Area'>Living Area</option>
                         <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                        <option value='".$row['id']."/Exterior'>Exterior</option>
                        <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen Kitchen</option>
                        <option value='".$row['id']."/Terrace'>Terrace/Patio</option>
                        <option value='".$row['id']."/Restaurant'>Restaurant</option>
                        <option value='".$row['id']."/Reception'>Reception</option>
                        <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                    </select></td>";*/

             }    

            else
            {
                echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' style='width:315px;height:300px;'/>
               
                <br>
                <hr>";
                

                     if($row['type'] == "--Select--"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom'>Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }


                          if($row['type'] == "Guestroom"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' selected>Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                            if($row['type'] == "Bathroom"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom' selected>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['type'] == "Living Area"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area' selected>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['type'] == "Hotel Front"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front' selected>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior'>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                  if($row['type'] == "Exterior"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' selected>Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen'>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  
                                  if($row['type'] == "In Room Kitchen"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' selected>In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                  if($row['type'] == "Terrace"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace' selected>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['type'] == "Restaurant"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant' selected>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }

                                   if($row['type'] == "Reception"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception' selected>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }
                                   if($row['type'] == "In Room Kitchen Dining"){
                            echo "<select name='type' style='width:315px;height:30px;text-align:center;background:lightblue;' class='type'>
                                    <option selected disabled>--Select--</option>
                                    <option value='".$row['id']."/Guestroom' >Guestroom</option>
                                    <option value='".$row['id']."/Bathroom'>Bathroom</option>
                                    <option value='".$row['id']."/Living Area'>Living Area</option>
                                    <option value='".$row['id']."/Hotel Front'>Hotel Front</option>
                                     <option value='".$row['id']."/Exterior' >Exterior</option>
                                    <option value='".$row['id']."/In Room Kitchen' >In Room Kitchen</option>
                                    <option value='".$row['id']."/Terrace'>Terrace</option>
                                    <option value='".$row['id']."/Restaurant'>Restaurant</option>
                                    <option value='".$row['id']."/Reception'>Reception</option>
                                    <option value='".$row['id']."/In Room Kitchen Dining'  selected>In Room Kitchen Dining</option>
                                    </select></td>";
                                  }



                goto start;
            }


        }

        echo "</tr>";
        echo "</table>";


?>