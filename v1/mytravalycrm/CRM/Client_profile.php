	

	<?php
	if($conn){
		if(!$conn)
		{
			include("../dbConnect.php");
		}
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

.carousel{
  
}
.prev, .next {

   position: absolute;
   top:95%;
}
</style>


		<table cellpadding=10>
		<tr>
			<?php //$path="edit_client_details.php?cid=".$_REQUEST['cid']; ?>
			<td>	<input type='button' class='btn btn-warning btn-sm' value='Edit Profile' data-toggle="modal" data-target="#EditModal" title='Edit Profile'/>	</td>
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
			<td ><br><input type='button' class='btn btn-info' name='send_mail' value='Send Mail' data-toggle="modal" data-target="#EmailModal" title="Send Mail To <?php echo  $row['FirstName'] ; ?> "/></td>
			<td> <br>
				
				<input type='button' class='btn btn-info' name='send_mail' value='Add Task'  data-toggle="modal" data-target="#TaskModal" /></td>
		</tr>
	</table>
	
  <!--pop up menu for adding task -->
	<div class="modal fade" id="TaskModal">
    <div class="modal-dialog">
      <div class="modal-content">
      	<form action="" method="post">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Add Task</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body" style="font-weight: bold;">
        	<div class="container p-5">
        		
		         	<div  class="form-group">
		    				<label class="" for="task" >Task </label>
							<select id="task" name="task" class=" float-right" required >
								<option value="" disabled selected>--select--</option>
		                        <option value="Call">Call</option>
		                        <option value="Email">Email</option>
		                        <option value="Message">Message</option>
		                        <option value="Post Card">Post Card</option>
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
		                                if(strcasecmp($_SESSION['user']['role'], 'SuperAdmin')==0 || strcasecmp($_SESSION['user']['role'], 'Admin')==0)
                                    {
                                        $emp_list=mysqli_query($conn,"select name,email from users where hotelid='".$_SESSION['user']['hotelid']."';") or die(mysqli_error($conn));
                                        while ($row3=mysqli_fetch_assoc($emp_list)) {
                                       echo "<option value='".$row3['name']."'>".$row3['name']."</option>";
                                      }
                                    }
                                    else
                                    {
                                      echo "<option value='".$_SESSION['user']['name']."' selected='selected' >".$_SESSION['user']['name']."</option>";
                                    }
		                            
		                            	
		                            ?>
		                           
		                            </select>
					</div>
					<div  class="form-group">
							<label class="" for="status">Status </label>
							<input type="text" list="status" class=" float-right" name="status" value="Not Yet Started"  readonly />
					</div>
					<div  class="form-group">
							<label class="" for="description" >Description </label>
							<input type="text" class=" float-right" name="description" id="Description" />
					</div>
					<div  class="form-group">
							<label class="" for="remarks" >Remarks</label>
							<input type="text" class=" float-right" name="remarks" id="remarks"  />
					</div>
					<!--<div  class="form-group" align="center">
						 <input type="submit"  id="submit" class=" btn btn-success "  style="width:100px;" name="submit" value="Save" >
					</div>-->
       
		
  					 <!-- Modal footer -->
		        <div class="modal-footer">
		        	<input type="submit" name="addtask" value="Add" class="btn btn-success" style="width: 100px" onclick="javascript: form.action='add_new_task_code.php'" />
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
		        </div>
  			 </div>
        </div>
        
        </form>
      </div>
    </div>
  </div>
  <!--end of pop up menu for Add task-->

  <!--pop up menu for sending mail-->
	<div class="modal fade" id="EmailModal">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="" method="post">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Send Mail</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<div class="container">
            <div class="float-right">

            <input type="button" class="btn btn-info btn-sm float-right" style="width: 100px" name="" value="Template" onclick="" data-toggle="modal" data-target="#TemplateModal" />
            <select id="mailTemplateSelect">
              <option value="" disabled selected>Place Holder</option>
             <option value="<?php echo '% comapny name%'; ?>" >%Company Name%</option>
             <option value="<input type='button' value='book now' class='btn btn-danger' onclick=&quot;window.location='http://admin.mytravaly.com/test/mytravalycrm/CRM/';&quot;>" >book now</option>
          </select>
            
           
            <br>
        </div>
          <br>
        		<div class="form-group">
        			<label>Subject</label>
        			<input type="text" class="form-control" id="subject" style="width: 100%" name="subject"  placeholder="Subject" required="" > 
        		</div>
        		<div class="form-group">
        			<label>Body</label>
        			<textarea class="form-control" id="body" style="border:solid 1px;border-radius: 5px" name="body" required="" rows="3" placeholder="Mail Content"></textarea>  
        		</div>
        	</div>
        	 <div class="modal-footer">
            <input type="submit" name="sendMail" value="Send" class="btn btn-success" style="width: 100px" onclick="javascript: form.action='send_mail_client.php'" />
            
            <input type="submit" class="btn btn-info float-right" style="" name="add_send_mail" value="Add & Send" onclick="javascript: form.action='send_mail_client.php'" />
        	 	
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        	 </div>
        	</div>
        	</form>
        </div>
    </div>
</div>
  <!--end of pop up menu for sending mail-->
<!--pop up menu for edit client profile-->
	<div class="modal fade" id="EditModal">
    <div class="modal-dialog">
      <div class="modal-content">
      <form action="" method="post">
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Edit</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <div class="modal-body">
        	<div class="container">
        	<?php
			
				$list=mysqli_query($conn,"select FirstName,LastName,Email,Phone,DOB,CompanyName from client_details where ClientId='".$_REQUEST['cid']."';")or die(mysqli_error($conn));
				$row=mysqli_fetch_assoc($list);
			?>
        		<div class="form-group">
        			<label>First Name</label>
					<input type="text" name="fname" class="float-right" value=<?php echo $row['FirstName']?> >
        		</div>
        		<div class="form-group">
        			<label>Last Name</label>
					<input type="text" name="lname" class="float-right"  value=<?php echo $row['LastName']?> >
				</div>
        		<div class="form-group">
        			<label>Phone No</label>
					<input type="number" name="pno" class="float-right" style="border: solid 1px;border-radius: 5px;width: 200px"  value=<?php echo $row['Phone']?> >
				
        		</div>
        		<div class="form-group">
        			<label>Email</label>	
					<input type="email" name="email"  class="float-right" style="border: solid 1px;border-radius: 5px;"  value=<?php echo $row['Email']?> >
				
        		</div>
        		<div class="form-group">
        			<label>Date of Birth </label>
					<input type="date" name="dob" class="float-right" style="border: solid 1px;border-radius: 5px;width: 200px"  value=<?php echo $row['DOB'] ?> >
				
        		</div>
        		<div class="form-group">
        			<label>Company Name</label>
					<input type="text" name="cname" class="float-right" value=<?php echo $row['CompanyName'] ?> >
				
        		</div>
        	</div>
        	 <div class="modal-footer">
        	 	<input type="submit" name="editClientDetails" value="Update" class="btn btn-success" style="width: 100px" onclick="javascript: form.action='edit_client_details_code.php'" />
		        	<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        	 </div>
        	</div>
        	</form>
        </div>
    </div>
</div>

  <!--end of pop up menu for  edit client profile-->
<!-- template message-->
<div class="modal fade" id="TemplateModal">
    <div class="modal-dialog">
      <div class="modal-content">
        
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Mail Template</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>



        <!-- Modal body -->
        <div class="modal-body" >
    <div class="container p-2">
      <div id="carouselExampleControls" class="carousel slide" >
        <div class="carousel-inner">
          <?php $mailtemplate=mysqli_query($conn,"select * from mail_template where HotelId=0 or HotelId='".$_SESSION['user']['hotelid']."'") or die(mysqli_error($conn));
                $no_temp=mysqli_num_rows($mailtemplate);
               $n=0;
              while($template=mysqli_fetch_array($mailtemplate))
              {

                if($n==0)
                {
              ?><div class="carousel-item active">
                
                <div class="numbertext mr-5 mt-2"><?php $n=$n+1; echo $n."/".$no_temp; 

                 if($template['HotelId']!=0 ){ ?>
                    <input type="button" class="btn btn-Warning btn-sm float-right temp_delete" style="width: 90px" text='<?php echo $template['TemplateId']; ?>' value='Delete' >
                  <?php } ?>

              </div><br/>
                <div class="form-group">
                  <label >Subject</label>
                  <input type="text" class="form-control" name="Subject" id='<?php echo $template['TemplateId']; ?>sub'  value='<?php echo $template['Subject']; ?>' readonly> 
                </div>
                <div class="form-group">
                  <label >Body</label>
                  <textarea class="form-control" id='<?php echo $template['TemplateId']; ?>body' rows='4'readonly><?php echo $template['Body']; ?> </textarea> 
                  
                </div>
                <div class="form-group mr-5 ml-5">
                    <br>
                    
                    <input type="button" class="btn btn-info btn-sm float-right temp_use"  style="width: 90px" text='<?php echo $template['TemplateId']; ?>' value='use' >
                    <br>
                    <hr>
                </div>
              </div>
                <?php  }
                else
                {
                  ?>
                  <div class="carousel-item ">
                    <div class="numbertext mr-5 mt-2"><?php $n=$n+1; echo $n."/".$no_temp; 

                    if($template['HotelId']!=0 ){ ?>
                    <input type="button" class="btn btn-Warning btn-sm float-right temp_delete" style="width: 90px" text='<?php echo $template['TemplateId']; ?>' value='Delete' >
                  <?php } ?>
                  </div><br/>
                  <div class="form-group">
                    <label >Subject</label>
                    <input type="text" class="form-control" name="Subject" id='<?php echo $template['TemplateId']; ?>sub'  value='<?php echo $template['Subject']; ?>' readonly> 
                  </div>
                  <div class="form-group">
                    <label >Body</label>
                    <textarea class="form-control" id='<?php echo $template['TemplateId']; ?>body' rows='4' readonly><?php echo $template['Body']; ?> </textarea> 
                    
                  </div>
                  <div class="form-group mr-5 ml-5">
                    <br>
                    
                    <input type="button" class="btn btn-info btn-sm float-right temp_use" style="width: 90px" text='<?php echo $template['TemplateId']; ?>' value='use' >
                    <br>
                    <hr>
                  </div>
              </div>
              <?php
                 }
            } ?>
            </div>
            <a class="carousel-control-prev " style="width: 7%" href="#carouselExampleControls" role="button" data-slide="prev">
           <i class="fas fa-angle-left fa-2x prev" aria-hidden="true" style="color: black"></i>
            <span class="sr-only">Previous</span>
        </a>
         <a class="carousel-control-next "  style="width: 7%" href="#carouselExampleControls" role="button" data-slide="next">
           <i class="fas fa-angle-right fa-2x next" aria-hidden="true" style="color: black"></i>
           <span class="sr-only">Next</span>
          </a>
      </div>
        
    
      </div>
        </div>
     </div>
   </div>
</div>



<!-- Script for sending mail to client while click on button-->
  <script >
  	/* $(document).ready(function(){
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
    });*/
  </script>
  <script >
   $(document).ready(function(){
        $('.temp_use').click(function()
        {
            var id=$(this).attr('text');
           document.getElementById('subject').value= document.getElementById(id+'sub').value;
           document.getElementById('body').value= document.getElementById(id+'body').value;
            $('#TemplateModal').modal('hide');
           
        });
       

    });
        

</script>
<script>
  $(document).ready(function(){
   $('.temp_delete').click(function(){
          var id=$(this).attr('text');
          var confirmation =confirm("Are You Sure! \n You Will Not Be Able To Recover This Mail Template!");
          if(confirmation==true)
          {
            $.post('jquery_called_function.php', { templateid:id }, function(data){
                    
                    alert(' Mail Template  Deleted Successfully...');
                    
                    location.reload();
                   
                  //  $('#TemplateModal').modal('show');
                    //do after submission operation in DOM
                });
          }
        });
     });
</script>
<script>
$('#mailTemplateSelect').on('change', function() {
    var cursorPos = $('#body').prop('selectionStart');
    var v = $('#body').val();
    var textBefore = v.substring(0,  cursorPos);
    var textAfter  = v.substring(cursorPos, v.length);

    $('#body').val(textBefore + $(this).val() + textAfter);
    $('#mailTemplateSelect').val('');
});
</script>


   
		