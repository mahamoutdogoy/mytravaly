<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 	
 	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 	
 	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
 	
 	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
  color: orange;
}
		/*input[type=button],input[type=submit]{
			background-color:#f15025;
			color:#fff;
			font-weight:bold
		}*/
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

<script type="text/javascript">
      function preventBack() { window.history.forward(); }
        setTimeout("preventBack()", 0);
        window.onunload = function () { null };
    </script>
    
</head>
<body>
	<form action="" method="post">
	<div class="row">
	<?php include("../dbConnect.php"); 
		include("header.php"); ?>
	</div>
	<div class="row">

		<div class="col-md-3">
			<?php include("sidebar.php"); ?>
		</div>
		
	<!-- product demo div-->
	<div class="col-md-6">
		<div>
			<?php $path="task.php?cid=".$_REQUEST['cid']; ?>
			<input type="button" value="back" onclick="window.location='<?php echo $path; ?>'">
		</div>
		<!-- Image Grid-->
		<div id="img_block" >
		
		<?php
   
    		$query=mysqli_query($conn,"select img,id from photo");
    		echo "<table  cellspacing='15px' id='t1'>";   
    		start:
        		 echo "<tr>";  
        		 $i=1;
         		 while($row=mysqli_fetch_array($query))
        		{    
           			 if($i < 3)
             		{
                		$i=$i+1;
                		echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' style='width:120px;height:95px;'         alt='$row[id]' class='img' onclick='choseImg(this)'/>

                		</td>";

             		}    

            		else if($i==5)
            		{
            			$i++;
                		echo "<tr/><tr><td colspan='3' style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' style='width:100%;height:95px;' class='img'  onclick='choseImg(this)'/>
               
               			</td>";

               			
            		}
            		else
            		{
                		echo "<td colspan='4' style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' style='width:120px;height:95px;' class='img'  onclick='choseImg(this)'/>
               
               			</td></tr>";

               			 goto start;
            		}
        		}

    		echo "</tr>";
    		echo "</table>";

		?>
	</div>


		<div id='product_card' style="display:none;" >
			<div>
				<input type="button" value="View Image Grid" id='btn-view' style="display: none" class="btn btn-info viewImg" onclick="showImgGrid()"/>
			</div>
					<br>
			<div class="row"> 
			
				<div classs='col-sm-2'>
					<br>
					<img id='selected-image'  style='width:115px;height:135px;'         class='img' />
				</div>
					
				<div  class='col-sm-6 '>
					<h4  style='color:red'><?php echo "company name @ MyTravaly"; ?></h4>
					<p><?php echo "company address  @ MyTravaly"; ?></p>
					<hr>
					<b>Email Body Text </b>
					<br>
  					<textarea id="description" align="lept" class="form-control" required >	</textarea>
  					
				</div>
				
				<div class='col-sm-3' align='center'>
					 	<h4 ><span style='color:orange;'>Price from</span></h4> <br>
					 	<input type="number" id="Price" placeholder="Price" class="form-control" required="required" />
					 	<br>
					 	<input type='button' class='btn btn-warning' name='book' id="book" value="Send Product Card"  />
				</div> <!--onclick="javascript: form.action='send_demo_mail.php?id='"-->
		    </div>
		</div>
	</div>
	<div class="col-md-3" >
		<?php include("Client_profile.php"); ?>
	</div>
</div>
</form>
</body>
</html>
<script>
	function choseImg(img)
	{
		
         document.getElementById('product_card').style.display="";
         document.getElementById('img_block').style.display="none";
         document.getElementById('btn-view').style.display="";
         document.getElementById('selected-image').src=img.src;
          document.getElementById('selected-image').alt=img.alt;
         
        //window.location="send_demo_mail.php?id="+img.alt;	
	}
	function showImgGrid()
	{
		 document.getElementById('btn-view').style.display="none";
		 document.getElementById('product_card').style.display="none";
         document.getElementById('img_block').style.display="";
        
	}
</script>
<script>
 $(document).ready(function(){
        $('#book').click(function()
        {
            var eid=$('#eid').text();
            var desc=$('#description').val().trim();
            var price=$('#Price').val();
            var img=$('#selected-image').attr('src');
           
            if(desc.length <= 0)
            {
            	alert('Enter description...');
            	$('#description').focus();
            }
            else if( price== '')
            {
            	alert('Enter Price...');
            	$('#Price').focus();
            }
            else
            {
            	alert(eid+" "+desc+" "+price);
            $.post('send_product_demo.php',{ email:eid,desc:desc,price:price,img_src:img },function(data){
            	alert("Product Card Sent Successfully...");
            	location.reload();

            });}
        });
    });
</script>