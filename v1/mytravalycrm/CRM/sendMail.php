<?php  include"red.php"; ?>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 	
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

<script >
	
$(document).ready(function(){
    $('.client').click(function(){
        var id=$(this).attr("text");
        var temp=confirm("Are You Sure! \n You Want's To Remove This Client!");
		
	if (temp== true) {
	   $('#'+id).prop( "disabled", true );
        $('#'+id).closest('div').hide();
	}
	 
    });
});

</script>

<style>
	select,input[type=text] {
			
			border-radius: 5px;
			height: 30px;
			
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
   
</head>
<body>
	<div class="container-fluid">
	<form action='' method='post'>
	<div class="row">

		<?php include("../dbConnect.php"); 
		include("header.php"); ?>
	</div>
			<!-- send mail form-->

		<div class="row">
			<div class="col-md-2">
				 <?php include("sidebar.php"); ?>
			</div>
			<div class="col-md-6">
				<div>
					
					<?php $path="window.location='index.php'"; ?>
					<i class="fas fa-chevron-circle-left  fa-2x" style="color: #5bc0de" onclick=<?php echo $path; ?> ></i>
				</div><br>
				<div class="float-right">

					
					 <input type="button" class="btn btn-info btn-sm " style="width: 100px" name="" value="Template" onclick="" data-toggle="modal" data-target="#TemplateModal" />

					  <select >
					  	<option value="" disabled selected>Place Holder</option>
					   <option value="<?php echo '% comapny name%'; ?>" >%Company Name%</option>
					   <option value="<input type='button' value='book now' class='btn btn-danger' onclick=&quot;window.location='http://admin.mytravaly.com/test/mytravalycrm/CRM/';&quot;>" >book now</option>
					</select>
					  
					 
					  <br>
  					
				</div>
				<br>
				<div class="form-group">
    				<label >Subject </label>
   					<input type="text" name="subject" id='subject' class="form-control" placeholder="Subject" required />
 				</div>
 				<div class="form-group">
    				<label >Content</label>
    				<textarea class="form-control" name="body" id='body' rows="5" placeholder="Body" required ></textarea>
  				</div>
  				<div class="">
  					<input type="submit" class="btn btn-success" style="width: 100px" name="send_mul_mail" value="Send" onclick="javascript: form.action='sendMail_code.php'" />

  					<input type="submit" class="btn btn-info float-right" style="" name="add_send_mail" value="Add & Send" onclick="javascript: form.action='sendMail_code.php'" />
  				</div>
			</div>

	
			<!--selected client details-->
				<div class="col-md-3">
				<?php
			
					if(!empty($_POST['client_check_list']))
					{
					
						$no_clients=sizeof($_POST['client_check_list']);
						echo "<div><b style='font-size:18px'>Selected Clients :</b></div><hr>";
						$i=0;
						foreach($_POST['client_check_list'] as $selected)
						{

							$list=mysqli_query($conn,"select FirstName,LastName from client_details where ClientId='".$selected."';") or 	die(mysqli_error($conn));
							$row=mysqli_fetch_assoc($list);
							echo "<div><input type='checkbox' name='list[]' hidden value='$selected' id='$i' checked/><p class='close client' text='".$i."' data-dismiss='alert' aria-label='close'>&times;</p>".$row['FirstName']." ".$row['LastName']." <hr/></div>";
							$i++;
						}

					}
					else {
						echo "<script>
						alert('Oops!  You Are Not Selected Any Clients ....');
						document.location='index.php'
						</script>";
					}
			

				?>
			</div>
		</div>
	</div>
	<!--pop up menu for adding task -->
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
					<?php	$mailtemplate=mysqli_query($conn,"select * from mail_template where HotelId=0 or HotelId=1 ");
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

  
</body>
</html>

		</div>
	</form>
</body>
</html>
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
$('select').on('change', function() {
    var cursorPos = $('#body').prop('selectionStart');
    var v = $('#body').val();
    var textBefore = v.substring(0,  cursorPos);
    var textAfter  = v.substring(cursorPos, v.length);

    $('#body').val(textBefore + $(this).val() + textAfter);
    $('select').val('');
});
</script>