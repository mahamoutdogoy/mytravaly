<?php
session_start();
 //include 'propertymenu.php'; 
 include 'Property_DB.php';
   
    $sql="SELECT MAX(property_id)  FROM propertydetails" ;
    $result=mysqli_query($con,$sql);
    $row = mysqli_fetch_row( $result);
    $largestNumber=$row[0]+1;
    $_SESSION['largestNumber']=$largestNumber;

    $sqll="SELECT MAX(ownerid) FROM owner";
    $res=mysqli_query($con,$sqll);
    $row = mysqli_fetch_row( $res);
    $largestNum=$row[0]+1;
    $_SESSION['ownerid']=$largestNum;

    
    
    
   


?>
 <!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script type="text/javascript">
    var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;


function enable_disable()
{
  document.getElementById('intime').value="";
  document.getElementById('outtime').value="";
 if( document.getElementById('intime').readOnly == true && document.getElementById('outtime').readOnly == true)
 {

  document.getElementById('intime').readOnly = false;
  document.getElementById('outtime').readOnly = false;
 }
 else
 {

  document.getElementById('intime').readOnly = true;
  document.getElementById('outtime').readOnly = true;

 }
  




}

    function next1()
    {
    if (document.myForm.pname.value == "")
    {
      alert("Please enter the property name");
      document.myForm.pname.focus();
      return false;
    }
    else if (document.myForm.ptype.value == "")
    {
      alert("Please enter the field");
      document.myForm.star.focus();
      return false;
    }
    else if (document.myForm.ptype.value == "")
    {
      alert("Please enter the property type");
      document.myForm.ptype.focus();
      return false;
    }
    else if (document.myForm.chain.value == "")
    {
      alert("Please enter the chain name");
      document.myForm.chain.focus();
      return false;
    }
    else if (document.myForm.establishment.value == "")
    {
      alert("Please enter the establishment date");
      document.myForm.establishment.focus();
      return false;
    }
    else if (document.myForm.currency.value == "")
    {
      alert("Please enter the currency type");
      document.myForm.currency.focus();
      return false;
    }
    else if (document.myForm.intime.value == "")
    {
      alert("Please enter the intime");
      document.myForm.intime.focus();
      return false;
    }
    else if (document.myForm.outtime.value == "")
    {
      alert("Please enter the out-time");
      document.myForm.outtime.focus();
      return false;
    }
     else if (document.myForm.description.value == "")
    {
      alert("Please enter the description");
      document.myForm.description.focus();
      return false;
    }


    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="block";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function next2()
    {
        if (document.myForm.street.value == "")
    {
      alert("Please enter the information");
      document.myForm.street.focus();
      return false;
    }
    else if (document.myForm.city.value == "")
    {
      alert("Please enter the information");
      document.myForm.city.focus();
      return false;
    }
    else if (document.myForm.state.value == "")
    {
      alert("Please enter the information");
      document.myForm.state.focus();
      return false;
    }
    else if (document.myForm.country.value == "")
    {
      alert("Please enter the information");
      document.myForm.country.focus();
      return false;
    }
    else if (document.myForm.zpcode.value == "")
    {
      alert("Please enter the information");
      document.myForm.zpcode.focus();
      return false;
    }

    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="block";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function next3()
    {
        if (document.myForm.ownerid.value == "")
    {
      alert("Please enter the owner id");
      document.myForm.ownerid.focus();
      return false;
    }
    else if (document.myForm.ownername.value == "")
    {
      alert("Please enter the owner name");
      document.myForm.ownername.focus();
      return false;
    }
    else if (document.myForm.owneremail.value == "" || reg.test(document.myForm.owneremail.value) == false)
    {
      alert("Please enter the valid owner email");
      document.myForm.owneremail.focus();
      return false;
    }
    else if (document.myForm.ownerphone.value == "")
    {
      alert("Please enter the owner contact number");
      document.myForm.ownerphone.focus();
      return false;
    }

    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="block";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function next4()
    {
         if (document.myForm.manname.value == "")
    {
      alert("Please enter the manager name");
      document.myForm.manname.focus();
      return false;
    }
    else if (document.myForm.manemail.value == "" || reg.test(document.myForm.manemail.value) == false)
    {
      alert("Please enter the manager email");
      document.myForm.manemail.focus();
      return false;
    }
    else if (document.myForm.manphone.value == "")
    {
      alert("Please enter the manager phone");
      document.myForm.manphone.focus();
      return false;
    }
    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="block";
    document.getElementById("div6").style.display="block";

    }
    function prev1()
    {
    document.getElementById("div1").style.display='block';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function prev2()
    {
    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="block";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function prev3()
    {
    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="block";
    document.getElementById("div4").style.display="none";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";

    }
    function prev4()
    {
    document.getElementById("div1").style.display='none';
    document.getElementById("div2").style.display="none";
    document.getElementById("div3").style.display="none";
    document.getElementById("div4").style.display="block";
    document.getElementById("div5").style.display="none";
    document.getElementById("div6").style.display="none";
    

    }

</script>



</head>
<body>
<div>
  <br>
  <br>
    <div class="row">

      <div class="col-md-3 ">
        <?php include'sidebar.php'?>
      </div>
      <div class="col-md-9" >
        <?php include 'propertymenus.php';?>
    <form action="propertydetails_be.php" method="POST"  name="myForm" style="margin-top:40px;" enctype="multipart/form-data" >

      
          
       
        
            <div id="div1" style="margin-left: 150px "  >
                        <table  cellpadding="10"  id="t1">
                                <tr style='background-color:#ff6f61;width: 10px;height: 10px;font-size: 22px;'>
                        <td align="center" colspan="4">
                        <b >Property Details</b>
                        </td>
                        </tr >
                                <tr >
                                        <td>
                                                <label  >Property Id</label>
                                        </td>
                                        <td>
                                                <input type="number"  value="<?php echo $largestNumber ?>" name="pid" class="form-control" disabled="" />
                                        </td>
                                </tr>
                <tr >
                        <td>
                                <label  >Property Name </label>
                        </td>
                        <td>
                                <input type="text" list="pname" id="pname" name="pname" class=" form-control" required >
                        </td>
                </tr>
                <tr>
                  <td>
                    <label>Star</label>
                  </td>
                  <td>
                    <select name="star" required="" class=" form-control">
                      <option>1</option>
                      <option>2</option>
                      <option>3</option>
                      <option>4</option>
                      <option>5</option>
                      <option>6</option>
                      <option>7</option>

                    </select>
                  </td>
                </tr>

                <tr >
                        <td>
                                <label  >Property Image </label>
                        </td>
                        <td>
                                <input type="file" accept=".jpg,.png,.jpeg" list="pimage" id="pimage" name="pimage" class=" form-control" required >
                        </td>
                </tr>




                <tr>
                        <td>
                                <label  >Property Type </label>
                        </td>
                        <td>
                                <select name="ptype" id="property"  class=" form-control" required>
                                        <option value="" style="display: none;">Choose Property</option>
                                        <option value="hotel">Hotel</option>
                                        <option value="resort">Resort</option>
                                        <option value="holidayHome">Holiday Home</option>
                                        <option value="apartment">Apartment</option>
                                        <option value="guestHouse">Guest House</option>
                                        <option value="bedAndBreakfast">Bed & Breakfast</option>
                                        <option value="cottage">Cottage</option>
                       </select>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Chain Name </label>
                        </td>
                        <td>
                                <input type="text"  name="chain" class=" form-control" required />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Establishment </label>
                        </td>
                        <td>
                                <input type="date"  name="establishment"  class="  form-control" required />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Currency </label>
                        </td>
                        <td>
                                <select name="currency" id="currency"  class="form-control" required>
                                        <option value="" style="display: none;">Choose Currency</option>
                                        <option value="Rupee">Rupee</option>
                                        <option value="Dollar">Dollar</option>
                                        <option value="Pound">Pound</option>
                                        <option value="Euro">Euro</option>
                                        <option value="Yen">Yen</option>
                                        <option value="Riyal">Riyal</option>
                                        <option value="Franc">Franc</option>
                                </select>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Check In time </label>
                        </td>
                        <td>
                                <input type="time"  name="intime" id="intime" class=" form-control" required />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Check Out Time </label>
                        </td>
                        <td>
                                <input type="time"  name="outtime" id="outtime"  placeholder="10:00:AM" class="form-control" required />
                        </td>
                </tr>
                <tr>
                        <td>

                                <input type="checkbox" onclick="return enable_disable();" name="change" id="change" style="width: 60px;height: 30px;" class=" form-control">


                                
                        </td>
                        <td>
                            <label >24 hour check in and check out</label>
                        </td>
                </tr>
                <tr>
                        <td>
                                <label class="" >Description...max 200 words</label>
                        </td>
                        <td>
                                <textarea name="description" rows="4" cols="55" maxlength="200">
                                        
                                </textarea>
                           
                           <!--  <input type="text" name="description" style="width: 400px;height: 200px; " required> -->
                        </td>
                       <tr>
                           <td>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt1" id="nxt1" value="next" onclick="next1()"  style='width:150px;border-radius:20px;' 
                               class="btn btn-success form-control "/>
                               

                           </td>
                       </tr>
                           
         </table>

    </div>
       
        <div id="div2" style="display: none;">
         <table   cellpadding="20" id="t2" >
                 <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;width: 20px;height: 20px;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b >Address</b>
                </td>
         </tr>
                <tr>
                        <td>
                                <label  >Street </label>
                        </td>
                        <td>
                                <input type="text"  name="street" class="form-control"  required  style="width:450px;" />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >City </label>
                        </td>
                        <td>
                                <input type="text"  name="city" class="  form-control" required style="width:450px;" />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >State </label>
                        </td>
                        <td>
                                <input type="text"  name="state" class="  form-control" required  style="width:450px;" />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Country </label>
                        </td>
                        <td>
                                <input type="text"  name="country" class="  form-control" required style="width:450px;" />
                        </td>
                </tr>
                <tr>
                        <td>
                                <label  >Zip/Postal Code </label>
                        </td>
                        <td>
                                <input type="number"  name="zpcode" class="  form-control" required style="width:450px;" />
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <label>Map Navigation</label>
                        </td>
                        <td>
                          <input type="text"  name="map_address" class="  form-control" placeholder="Property name/locality name" required style="width:450px;" />
                        </td>
                      </tr>
                        <tr>
                           <td>
                            <input type="button"  name="pre1" value="previous" onclick="prev1()" style='width:150px;border-radius:20px;' class="btn btn-warning form-control"/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt2" value="next" onclick="next2()" style='width:150px;border-radius:20px;' 
                               class="btn btn-success  form-control"/>

                           </td>
                       </tr>
                
        </table>
    </div>
        
        <div id="div3" style="display:none ;">
        <table  cellpadding="20" id="t3" >
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b>Owner</b>
                </td>
         </tr>
         <tr>
            <td>
                <label  >Owner Id</label>
            </td>
            <td>
                <input type="number" value="<?php echo $largestNum ?>"  name="ownerid" class="  form-control" required style="width:450px;" disabled="" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Owner Name</label>
            </td>
            <td>
                <input type="text"  name="ownername" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >OwnerEmail</label>
            </td>
            <td>
                <input type="email"  name="owneremail" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Owner Phone</label>
            </td>
            <td>
                <input type="number"  name="ownerphone" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
                    <tr>
                           <td>
                            <input type="button"  name="pre2" value="previous" onclick="prev2()" style='width:150px;border-radius:20px;' class="btn btn-warning form-control"/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt3" value="next" onclick="next3()" style='width:150px;border-radius:20px;' 
                               class="btn btn-success form-control"/>

                           </td>
                       </tr>
    </table>
</div>
    <div id="div4" style="display: none">
    <table   cellpadding="20" id="t4" >
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b style="color: black;">Manager</b>
                </td>
         </tr>
         <tr>
            <td>
                <label  >Manager Name</label>
            </td>
            <td>
                <input type="text"  name="manname" class="  form-control" required style="width:450px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label  >Manager Email</label>
            </td>
            <td>
                <input type="email"  name="manemail" class="  form-control" required style="width:450px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label  >Manager phone</label>
            </td>
            <td>
                <input type="number"  name="manphone" class="  form-control" required style="width:450px;"/>
            </td>
        </tr>
        <tr>
                           <td>
                            <input type="button"  name="pre3" value="previous" onclick="prev3()" style='width:150px;border-radius:20px;' class="btn btn-warning form-control"/>
                               
                           </td>
                           <td>
                               <input type="button"  name="nxt4" value="next" onclick="next4()" style='width:150px;border-radius:20px;' 
                               class="btn btn-success form-control"/>

                           </td>
                       </tr>
    </table>
    </div>
    
    <div id="div5" style="display: none">
    <table  cellpadding="8" id="t5" >
         <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b style="color: black;">Front Desk/Reservation Manager</b>
                </td>
         </tr>
         <tr>
            <td>
                <label  >Manager Name</label>
            </td>
            <td>
                <input type="text"  name="resmanname" class="  form-control" required style="width:450px;" />
            </td>
        </tr>

         <tr>
            <td>
                <label  >Manager Email</label>
            </td>
            <td>
                <input type="email"  name="resmanemail" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Manager phone</label>
            </td>
            <td>
                <input type="number"  name="resmanphone" class="  form-control" required style="width:450px;" />
            </td>
        </tr>
        <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;font-size: 22px;'>
                <td align="center" colspan="4">
                        <b style="color: black;">keywords</b>
                </td>
         </tr>



 <!-- <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;'>
                <td align="center" colspan="4">
                        <b style="color: black;">Front Desk/Reservation Manager</b>
                </td>
         </tr> -->        

        <tr>
            <td>
                <label  >City Life</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;width: 20px;height: 20px;"style="border-radius: 10px;" name="citylife" value="citylife" class=" btn btn-success form-control"   style="width:450px;">
            </td>
        </tr>
        <tr>
            <td>
                <label  >Night Life</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;width: 20px;height: 20px;" name="nightlife" value="nightlife" class="  form-control"  style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Destination Wedding</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;margin-left:150px;width: 20px;height: 20px;" name="destination" value="destinationwedding" class="  form-control" style="width:450px;" />
            </td>
        </tr>
        <tr>
            <td>
                <label  >Food</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;width: 20px;height: 20px;" name="food" value="food" class="  form-control"   style="width:450px;"/>
            </td>
        </tr>
        <tr>
            <td>
                <label  >Heritage and Culture</label>
            </td>
            <td>
                <input type="checkbox" style="margin-left:150px;width: 20px;height: 20px;" name="heritage" value="heritageandculture" class="  form-control"  style="width:450px;" />
            </td>
        </tr>
     
     </table>
     </div>
    
     <div id="div6" style="display: none">
     <table  id="t6" style="margin-bottom: 50px;">
         <tr>
             <td>
                <input type="button"  name="pre4" value="previous" onclick="prev4()" style='width:150px;border-radius:20px;' class="btn btn-warning form-control"/>
                </td>  

                <td>         
                <input type="submit"  name="submit" value="submit" style='margin-left:110px;width:150px;border-radius:20px;background-color:#ff6f61;'
                class="btn btn-success form-control"/>
            </td>

              <!-- <form action="<?php// echo $_SERVER['PHP_SELF']; ?>">   -->


                <!--<input type="button" onclick="prev1();" name="addnew" value="add new"   
                    style='width:150px;border-radius:20px;' class="btn btn-success form-control"/>
                -->
               
            
             
         </tr>
     </table>



 </div>
     
   

   </form>
 </div>
  
</div>
</div>
</body>
</html>
             
                