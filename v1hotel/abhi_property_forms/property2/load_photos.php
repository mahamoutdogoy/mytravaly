<?php
    include 'Property_DB.php';
    $room_id = $_GET['q'];
    echo"<script>alert('hi')</script>";
    //$meal_plan=$_GET['p'];
    $property_id=$_GET['r'];
    $query=mysqli_query($con,"SELECT * FROM images join mapping_images on mapping_images.image_id=images.image_id  where property_id='$property_id' and room_id='$room_id'");
        echo "<table  cellspacing='15px' id='t1'>";   
        start:
            echo "<tr>";  
            $i=1;
            while($row=mysqli_fetch_array($query))
            {    
                if($i <= 2)
                {
                    $i=$i+1;
                    echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' style='width:270px;height:270px;'/>

                     <br>
                     <hr>";

                            if($row['image_type'] == "--Select--"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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

                    /*<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['image'])."' style='width:270px;height:270px;'/>
               
                <br>
                <hr>";
                

                     if($row['image_type'] == "--Select--"){
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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
                            echo "<select name='type' style='width:270px;height:30px;text-align:center;background:lightblue;' class='type'>
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