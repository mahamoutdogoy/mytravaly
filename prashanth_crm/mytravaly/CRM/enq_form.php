<html lang="en">
<head>
  <title> Enquirer </title>
  <link rel="stylesheet" type="text/css" href="main.css">
  <meta charset="utf-8">
    
  <script type="text/javascript">
        function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
  </script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  
  <link rel="stylesheet" type="text/css" href="first.css">

  <script type="text/javascript">
      
      //function for date calculation
      function myfunction() {
          
          var x = document.getElementById("priority").value;
          var date=new Date();
          
          if(x=="Hot")
          {
              date.setDate(date.getDate()+1);
              getD();
          }
          else if(x=="Warm")
          {
            date.setDate(date.getDate()+3);
            getD();
          }
          else if(x=="Cold")
          {
            date.setDate(date.getDate()+7);
            getD();
          }

          function getD(){
                
                var todaydate = date;
                var day = todaydate.getDate();
                var month = todaydate.getMonth() + 1;
                var year = todaydate.getFullYear();
                var datestring =  year + "/" + month + "/" + day;
                document.getElementById("duedate").value = datestring;
          }
          //getDate();
      }
           
</script>

<style type="text/css">
  div.transbox
  {
    margin: 5%;
    font-weight: bold;
    color: #000000;
  }
</style>
</head>
<body >
  <!--<div class="text-center" style="width:85%"></div> -->
  <!-- Header Section -->
   <?php  include("header.php")?>
   
   <br><br>
   <!--Sidebar and form section -->
   <div class="row">
        <!--Sidebar section -->
        <div class="col-md-3"  >
            <?php include("sidebar.php"); ?>
        </div>
        <!--form section-->
        <div class="col-md-9">
          <form method="POST" action="enquiry.php">
      
                 <table cellpadding="20" >
                    
                    <tr>
                        <td class="text-left"><label class=""  name="" for="firstname">First Name</label></td>
                        <td ><input  id="firstname" name="firstname" type="text" placeholder="Firstname" class=" form-control " required=""></td>
        
                         <td><label class="" for="lastname">Last Name</label></td>
                         <td><input id="lastname" name="lastname" type="text" placeholder="Lastname" class="form-control "></td>
           
    
                    </tr>
                    <tr>
                        <td><label class=" for="phone">Phone    </label></td>
                        <td><input id="phone" name="phone" type="text" placeholder="Phone" class="form-control " required=""></td>
                        <td><label class=" " for="email">Email</label></td>
                        <td><input id="email" name="email" type="email" placeholder="Email" class="form-control " required=""></td>
                    </tr>
                    <tr>

                        <td class="text-left"><label class="" for="companyname">Company Name</label></td>
                        <td><input id="companyname" name="companyname" type="text" placeholder="Companyname" class="form-control "></td>
                        <td><label class="" for="dob">DOB      </label></td>
                        <td><input type="date" name="dob"  placeholder="DOB" class="form-control "></td>
                    </tr>
                    <tr>
                       <td><label class=" " for="priority" >Priority </label></td>
                       <td><select id="priority" placeholder="Add" class="col-lg-12 form-control " name="priority" onchange="myfunction()">
                            <option>--select--</option>
                            <option value="Hot" >Hot</option>
                            <option value="Warm">Warm</option>
                            <option value="Cold">Cold</option>
                            </select>
                        </td>
                        <td><label class="" for="Duedate">Due date  </label> </td>
                        <td><input type="text" name="duedate" id="duedate" placeholder="Duedate" class="form-control " readonly=""></td>

                    </tr>
                   <tr>
                        <td><label class="" for="task" >Task </label></td>
                        <td><select id="task"name="task" class="col-lg-12 form-control">
                          <option value"call">Call</option>
                            <option value="Email">Email</option>
                            <option value="Message">Message</option>
                            <option value="Product Demo">Product Demo</option>
                            </select>
                        </td>
                         <td><label class="" for="lead"> Lead Source</label></td>
                         <td><select id="lead" name="lead" class="col-lg-12 form-control">
                            <option value="Social Mdia">Social Media </option>
                            <option value="Referraleferral">Referral</option>
                            <option value="Advertisement">Advertisement</option>
                            <option value="Newspaper">Newspaper</option>
                            <option value="Email">Email campaign</option>
                            </select>
                        </td>
                    </tr>
                  <tr>
                        <td><label class="" for="assignto">Assign to </label></td>
                        <td>

                            <select id="assignto" name="assignto"  placeholder="Assign to" required="" class=" form-control">
                            <option value="" disabled selected>---select---</option>
                              
                            <?php  include("../dbConnect.php");
                            $list=mysqli_query($conn,"select id,name,email from employee") or die(mysqli_error($conn));

                              while($row = mysqli_fetch_assoc($list))
                              {                      
                                echo "<option  value='".$row['name']."''>".$row['name']."</option>";
                              }
                            ?>
                           
                            </select>
                          </td>
                          <td><label class="" for="status">Status </label></td>
                        <td><input type="text" list="status" name="status" value="NOT YET STARTED" class=" form-control" readonly /></td>
                      </tr>
                  <tr>
                        <td><label class="" for="remarks" >Remarks</label></td>
                        <td><input type="text" name="remarks" id="remarks" class="form-control " ></td>
                        <td><label class="" for="description" >Description </label></td>
                        <td><input type="text" name="description" id="Description" class="form-control "></td>
                  </tr>
                 <tr>
                        <td colspan="2" align="right"> <input type="submit"  id="submit"class=" btn btn-success "  style="width:100px;" name="submit" value="Save" >
                        <td colspan="2">      
                          <input  type="reset"  name="reset"id="reset" class=" btn  btn-success" style="width:100px;"></td>
                        </td>
                </tr>
        </table>
     
  </div>
  <!--end of form section -->
  
</form>
</div>
<!--end of sidebar and form section -->
</div>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    
  </body>
  
</html>
