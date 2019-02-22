	

	<?php
	if($conn){
		include("../dbConnect.php");
	
		$list=mysqli_query($conn,"select FirstName,LastName,Email,Phone from client_details	where ClientId='".$_REQUEST['cid']."';")or die(mysqli_error($conn));
		
		$row=mysqli_fetch_assoc($list);
	}
		
	?>


<!-- script for calculate due date-->
<script type="text/javascript">

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
<style>
	select,input[type=text] {
			width:200px;
			border-radius: 5px;
			height: 30px;
			border: solid 1px;
		}
		td{
			font-weight: bold;
			font-family: times;
		}
</style>


		<table cellpadding=10>
		<tr>
			<?php $path="edit_client_details.php?cid=".$_REQUEST['cid']; ?>
			<td>	<input type='button' class='btn btn-warning btn-sm' value='Edit Profile' onclick="window.location='<?php echo $path; ?>'" />	</td>
		</tr>
		<tr>
			<td>	<img src='img/profile.png' height='70px' width='70px' radius=50>	</td>
			<td> <b style='font-size:25'><?php echo $row['FirstName'].' '.$row['LastName']; ?> </b> </td>
		</tr>
		<tr>
			<td>Phone No</td><br>
			<td><b><?php echo $row['Phone']; ?></b></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><label id="eid"> <span style='color:blue' id="email"><?php echo $row['Email']; ?> </span> </label></td>
		</tr>
		<tr>
			<td ><br><input type='button' class='btn btn-info' name='send_mail' value='Send Mail' data-toggle="modal" data-target="#EmailModal"/></td>
			<td> <br>
				
				<input type='button' class='btn btn-info' name='send_mail' value='Add Task'  data-toggle="modal" data-target="#TaskModal" /></td>
		</tr>
	</table>
	<!--pop up menu for sending mail-->
	<div class="modal fade" id="EmailModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Send Mail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	
         	<div class="form-group">
    				<label >Subject </label>
   					<input type="text" id="subject" style="width: 100%" class="form-control" name="subject" placeholder="Subject" required="" />
 				</div>
 				<div class="form-group">
    				<label >Body</label>
    				<textarea class="form-control" name="body" style="border: solid 1px;border-radius: 5px" rows="3" placeholder="Body" required=""></textarea>

  				</div>
  				
  					 <!-- Modal footer -->
		         <div class="modal-footer">
		         	<input type="submit" name="sendMail" class="btn btn-success" style="width: 100px"   value="send"   onclick="form.action='send_mail_client.php'" />
		           	<input type="button" class="btn btn-danger" data-dismiss="modal" value="Close" >
		        </div>
        </div>
        
        
      </div>
    </div>
  </div>
  <!--end of pop up menu for sending mail-->

  <!--pop up menu for adding task -->
	<div class="modal fade" id="TaskModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Task</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<div class="container p-5">
        		
		         	<div  class="form-group">
		    				<label class="" for="task" >Task </label>
							<select id="task" name="task" class=" float-right" required >
								<option value="" disabled selected>--select--</option>
		                        <option value="Call">Call</option>
		                        <option value="Email">Email</option>
		                        <option value="Message">Message</option>
		                        <option value="Product Demo">Product Demo</option>
		                    </select>
					</div>

					<div  class="form-group">
							<label class=" " for="priority" >Priority </label>
							<select class=" float-right"  id="priority"  required name="priority"  onchange="myfunction()">
		                            <option value="" disabled selected>--select--</option>
		                            <option value="Hot" >Hot</option>
		                            <option value="Warm">Warm</option>
		                            <option value="Cold">Cold</option>
		                    </select>
					</div>
					<div  class="form-group">
							<label class="" for="Duedate">Due date  </label>
							<input type="text" class=" float-right" name="duedate" id="duedate" placeholder="Duedate"  readonly="" / >
					</div>
					<div  class="form-group" >
							<label class="" for="assignto">Assign to </label>
							<select id="task" class=" float-right" name="assignto" required>
		                            <option value='' disabled selected>---select---</option>
		                              <?php
		                           
		                            	$emp_list=mysqli_query($conn,"select name,email from employee") or die(mysqli_error($conn));
		                            	while ($row3=mysqli_fetch_assoc($emp_list)) {
		                               		 echo "<option value='".$row3['name']."'>".$row3['name']."</option>";
		                               		}
		                            ?>
		                           
		                            </select>
					</div>
					<div  class="form-group">
							<label class="" for="status">Status </label>
							<input type="text" list="status" class=" float-right" name="status" value="NOT YET STARTED"  readonly />
					</div>
					<div  class="form-group">
							<label class="" for="description" >Description </label>
							<input type="text" class=" float-right" name="description" id="Description" />
					</div>
					<div  class="form-group">
							<label class="" for="remarks" >Remarks</label>
							<input type="text" class=" float-right" name="remarks" id="remarks"  >
					</div>
					<!--<div  class="form-group" align="center">
						 <input type="submit"  id="submit" class=" btn btn-success "  style="width:100px;" name="submit" value="Save" >
					</div>-->
       
		
  					 <!-- Modal footer -->
		        <div class="modal-footer">

		        	<input type="submit" class="btn btn-success" style="width: 100px"  name="addtask" value="Add"   onclick="javascript: form.action='add_new_task_code.php'" >
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        </div>
  			 </div>
        </div>
        
        
      </div>
    </div>
  </div>
  <!--end of pop up menu for Add task-->

<!-- Script for sending mail to client while click on button-->
  <script >
  	 $(document).ready(function(){
        $('#sendmail').click(function()
        {
            var email=$('#eid').text();
            var sub=$('#subject').val();
            var body=$('#body').val();
            alert(email+sub+body);
           $.post("sendMail_code.php",{eid:email,sub:sub,body:body},function(data)
           {
           		alert("Mail Sent Successfully... ");
           		location.reload();
           });
        });
    });
  </script>


   
		