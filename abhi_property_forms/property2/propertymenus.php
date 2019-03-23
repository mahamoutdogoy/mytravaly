
<!DOCTYPE html>

<html>

<head>

	

    

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

   
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>




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

	/*function hide()

	{

		document.getElementById('Div2').style.display= 'none';

	}*/

	

/*function switchVisible() {

			

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

           

}*/

</script>



<style type="text/css">

	.sticky {

 position: fixed;

 top: 0;

 
 z-index: 1;

}
.sticky + .content {

 padding-top: 102px;

}
</style>
	



</head>

<body onload="hide();">

<div class="row header" id="myHeader" style="background:#fff;"> 





	  	

 <ul style=" color:#FF6F61;font-size: 10px" class="nav unstyled-list ml-0 float-left" id="Div1" >

 

	    

	  	  <li class="nav-item"><a style="border:solid red 1px; border-radius:5px; padding: 5px;margin-top: 10px;" id="hide" class="btn-link mr-2 active  "  onclick="switchVisible();" href="#"><b>Hotelier</b></a></li>

	  	  <li class="nav-item"><a  class="btn-link " href="propertydetail.php"><b>Property Details</b></a></li>

		  <li  class="nav-item"><a class="btn-link " href="rooms_dashboard_new.php"><b>Rooms, Inventory, Tarrif</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="photo.php"><b>Photos</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="amenities.php"><b>Amenities</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="policy.php"><b>Policy</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="#"><b>Channel Manager</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="#"><b>OTAs Connectivity</b> </a></li>

		  <li class="nav-item"><a class="btn-link" href="bankdetails.php"><b>Bank Detail</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="agreement_page.php"><b>Agreement</b></a></li>

		  <li class="nav-item"><a class="btn-link" href="documents.php"><b>Documents</b></a></li>

	  </ul>

	 <!--  <ul class="nav float-left ml-5" id="Div2">

	  	<li class=" mr-3 nav-item"><a style="border:solid red 1px;border-radius:5px;padding:  5px; margin-top: 10px;" id="hide" onclick="switchVisible();" class=" ml-5 btn-link"  href="#">Switch to hotelier</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="#">Tour Operator</a></li>

	  	<li class="mr-3 nav-item"><a class="btn-link"  href="#">Packages,Tarriff</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link" href="#">Photos</a></li>

	  	<li class="mr-3 nav-item"><a class="btn-link"  href="#">Itinerary</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="#">Policy</a></li>

	  	<li class=" mr-3 nav-item"><a class="btn-link"  href="#">Bank Detail</a></li>

	  	<li class="nav-item"><a class="btn-link"  href="#">Agreement</a></li>

	  	<li class="nav-item"><a class="btn-link"  href="#">Documents</a></li>

	  



     </ul> -->



</div>

</body>



</html>
<script>

/*window.onscroll = function() {myFunction()};var header = document.getElementById("myHeader");

var sticky = header.offsetTop;function myFunction() {

 if (window.pageYOffset > sticky) {

   header.classList.add("sticky");

 } else {

   header.classList.remove("sticky");

 }

}
*/
</script>