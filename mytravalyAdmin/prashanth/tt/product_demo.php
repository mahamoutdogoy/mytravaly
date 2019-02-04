<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

</head>
<body><!--
		<form id="form1" runat="server" action="send_demo_mail.php" method="post">
			<div class="row">
  				<div class="col-sm-2">
  					<img id="blah" src="img/upload1.png" alt="your image" height="200px" width="200px" />
			
					<br/>
   					<input type='file' id="imgInp" name='img' value="select Photo"/>
   				</div>
   				

  			<div class="col-sm-8" style="text-align: center;border: 5px">
  				<table>
  					<tr>
  						<td>
  							<label>Facilities</label>
  						</td>
  						<td>
  							<textarea name='facilities' > </textarea><br>
  						</td>
  					</tr>
  					<tr>
  						<td>
  							<label>Price</label>
  						</td>
  						<td>
  							<input type="text" name="Price">
  						</td>
  					</tr>
  					<tr>
  						<td><br>
  							<input type="submit" name="submit" value='Send'/>
  						</td>
  					</tr>
  				</table>
  				
  				
  				
  			</div>
		</div>
		

	</form>
</body>
</html>
<script>
	function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#imgInp").change(function(){
    readURL(this);
})
</script>

-->


<div >
	<br>
	
	<input type="button" value="View Images" class="btn btn-info viewImg" />
	<div id="img_block">


<?php



    $con=mysqli_connect("localhost","root","","sb_database");
   
    $query=mysqli_query($con,"select img from photo");
    echo "<table  cellspacing='15px' id='t1'>";   
    start:
         echo "<tr>";  
         $i=1;
         while($row=mysqli_fetch_array($query))
        {    
            if($i <= 3)
             {
                $i=$i+1;
                echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' style='width:315px;height:300px;' class='img'/>

                </td>";

             }    

            else
            {
                echo "<td style='padding-top: 1.9em;padding-bottom: 1.9em;padding-right:1.9em;padding-left:1.9em;'><img src='data:image/jpeg;base64,".base64_encode($row['img'])."' style='width:315px;height:300px;' class='img'/>
               
               </td>";

                goto start;
            }


        }



    echo "</tr>";
    echo "</table>";

?>
</div>
</div>
</body>
</html>
<script>

	$(document).ready(function(){
    $('.img').click(function(){
        var tid=$(this).attr("src");
        alert("hi....");
</script>