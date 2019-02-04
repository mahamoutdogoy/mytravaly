<html lang="en">
<head>
  <link rel="stylesheet" type="text/css" href="main.css">
  <meta charset="utf-8">
  <title>Create Task</title>
<style type="text/css">
  /* start login page*/


 table tr td,table tr+td{
  border: 1px solid white;
  border-top: 1px solid white;
 }
 #bb{
  bottom: 75px;
  right: 50px;

 }


}

  


  </style>
  <style type="text/css">
    .btnaamir:hover{
  background-color:#20b2aa;

}
input[type="text"],input[type="email"],input[type="date"],#priority,#task,#lead,#assignto,#submit,#reset
{
  border-radius:10px;
}
  </style>

  <style type="text/css">
    .btnaamir{
      background-color:white;
      border:1px solid red;
    }
  </style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" type="text/css" href="first.css">

<script type="text/javascript">
function myfunction() {
  var x = document.getElementById("priority").value;
  var date=new Date();
  if(x=="Hot")
  {
 date.setDate(date.getDate()+1)
  document.getElementById("duedate").value=date;
  getD();
}
else if(x=="Warm")
{
  date.setDate(date.getDate()+3)
  document.getElementById("duedate").value=date;
  getD();
}
else if(x=="Cold")
{
  date.setDate(date.getDate()+7)
  document.getElementById("duedate").value=date;
  getD();
}
function getD(){
  var todaydate = date;
  var day = todaydate.getDate();
  var month = todaydate.getMonth() + 1;
  var year = todaydate.getFullYear();
  var datestring = day + "/" + month + "/" + year;
  document.getElementById("duedate").value = datestring;
 }
getDate();}
            $(document).ready(function(){
            $('#assignto').change(function(){
                //Selected value
                var inputValue = $(this).val();
        //var string1=inputValue.split(" ");
        //var id=string1[0];
        //var eid=string1[1];

                alert("Sending a Mail To "+inputValue);

                //Ajax for calling php function
               // $.post('submit.php', { dropdownValue: inputValue }, function(data){
                    //alert('ajax completed. Response:  '+data);
                    //do after submission operation in DOM
               // });
            });
        });
</script>

</head>
<body style="background: url(http://localhost/tt/img/4.jpg) no-repeat bottom right ;
    background-size: cover;">
  <!--<div class="text-center" style="width:85%"></div> -->
  
  
  <form method="POST" action="enquiry.php">
    <div>
        <center>
            <div  style="text-align:'center';width: 80%;background-color:#fff;opacity:.9">

                <table cellpadding="20"  class="table table-striped">
                    <tr style='font-family: Britannic Bold;font-size:20;background-color:#ff6f61;'>
                        <td align="center" colspan="4">
                        <h3><b>Enquiry</b></h3>
                        </td>
                    </tr>
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
                              <?php
                            $con=mysqli_connect("localhost","root","","sb_database") or die( mysqli_connect_error());
                            $list=mysqli_query($con,"select id,name,email from employee") or die(mysqli_error($con));
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
    </center>
  </div>

  
</form>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script>
                  function getDate(){
                    var todaydate = new Date();
                    var day = todaydate.getDate();
                    var month = todaydate.getMonth() + 1;
                    var year = todaydate.getFullYear();
                    var datestring = day + "/" + month + "/" + year;
                    document.getElementById("frmDate").value = datestring;
                   }
                  getDate();
    </script>
  </body>
  
</html>
