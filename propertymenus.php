<!DOCTYPE html>

<html>

<head>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>



<style>



ul {

  list-style-type: none;

  margin: 0;

  padding: 0;

  overflow: hidden;

  /*background-color: #333;*/

}



ul li a:hover {

text-decoration: none;

border-radius: 5px;

color: #FF6F61;

background-color:#20b2aa;



}

li {

  float: left;



}



li a,button {

  display: block;

  text-align: center;

  padding: 14px 16px;

  text-decoration: none;

  

  



 

}



.active,.btn-link {

	 color:#FF6F61;

}



.active,.btn-link:hover {

	text-decoration: none;

	padding-bottom: 12px;

	padding-top: 10px;

	color: black;

}

}

</style>

<script>

	function hide()

	{

		document.getElementById('Div2').style.display= 'none';

	}

	

function switchVisible() {

			

     			if(document.getElementById('hide').value=="switch to hotelier")

     				document.getElementById('hide').value= "switch to tour Operator";

     			else

     				document.getElementById('hide').value= "switch to hotelier";

            if (document.getElementById('Div1'))

             {

             	



                if (document.getElementById('Div1').style.display == 'none') 

                {

                	

            	

                    document.getElementById('Div1').style.display = 'block';

                    document.getElementById('Div2').style.display = 'none';

                }

                else 

                {

                	



                    document.getElementById('Div1').style.display = 'none';

                    document.getElementById('Div2').style.display = 'block';

                }

            }

           

}

</script>



	



</head>



<body onload="hide();">

<div class="row ">





	  	

 <ul style=" color:#FF6F61;width: 100%;" class="nav unstyled-list ml-5 float-left" id="Div1" >

 

	    

	  	  <li class="nav-item"><a style="border:solid red 1px; border-radius:5px; padding: 5px;margin-top: 10px;" id="hide" class="btn-link mr-5 active  "  onclick="switchVisible();" href="#">switch to tour operator</a></li>

	  	  <li class="nav-item"><a  class="btn-link " href="propertydetail.php">Property Details</a></li>

		  <li  class="nav-item"><a class="btn-link " href="roomtariff.php">Rooms, Inventory, Tarrif</a></li>

		  <li class="nav-item"><a class="btn-link" href="photo.php">Photos</a></li>

		  <li class="nav-item"><a class="btn-link" href="amenities.php">Amenities</a></li>

		  <li class="nav-item"><a class="btn-link" href="#">Policy</a></li>

		  <li class="nav-item"><a class="btn-link" href="#">Channel Manager</a></li>
#
		  <li class="nav-item"><a class="btn-link" href="#">OTAs Connectivity </a></li>

		  <li class="nav-item"><a class="btn-link" href="Bankdetails.php">Bank Detail</a></li>

		  <li class="nav-item"><a class="btn-link" href="#">Agreement</a></li>

		  <li class="nav-item"><a class="btn-link" href="Documents.php">Documents</a></li>

	  </ul>

	  <ul class="nav float-left ml-5" id="Div2">

	  	<li class=" mr-3 nav-item"><a style="border:solid red 1px;border-radius:5px;padding:  5px; margin-top: 10px;" id="hide" onclick="switchVisible();" class=" ml-5 btn-link"  href="#">Switch to hotelier</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="#">Tour Operator</a></li>

	  	<li class="mr-3 nav-item"><a class="btn-link"  href="#">Packages,Tarriff</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link" href="photo.php">Photos</a></li>

	  	<li class="mr-3 nav-item"><a class="btn-link"  href="#">Itinerary</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="#">Policy</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="Bankdetails.php">Bank Detail</a></li>

	  	<li class="nav-item"><a class="btn-link"  href="#">Agreement</a></li>

	  	<li class="nav-item"><a class="btn-link"  href="Documents.php">Documents</a></li>

	  



     </ul>



</div>



</body>



</html>

