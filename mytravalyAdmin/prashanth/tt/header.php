<!--top menu-->


<div class="container mb-3">
  <div class="">
    <div>
      <a href=""><img src="images/logo.png" class="float-left" alt="" style="margin-left:-90px; "></a>
    <div id="hassan">
        <ul class="nav list-unstyled float-right">
          <li class="nav-item"><a class="nav-link" href="#"><span><i class="fa fa-globe"></i></span>&nbsp;Language</a></li>
          <li><a href="#" class="nav-link"><span><i class="fa fa-money"></i></span>&nbsp;Currency</a></li>
          <li><a href="#" class="nav-link"><span><i class="fa fa-plus"></i></span>&nbsp;Add your property</a></li>
          <li><a href="#exampleModal" data-toggle="modal" data-target="#exampleModal" class="nav-link"><span><i class="fa fa-sign-in"></i></span>&nbsp;Login</a></li>
        </ul>
        </div>
      
    </div>
    <br>
    <br>
    <ul class="nav">
      <li class="nav-item"><a href="" class="nav-link">Hotels</a></li>
      <li class="nav-item"><a href="" class="nav-link">Holiday home</a></li>
      <li class="nav-item"><a href="" class="nav-link" >Resorts</a></li>
      <li class="nav-item"><a href="" class="nav-link">Apartment</a></li>
      <li class="nav-item"><a href="" class="nav-link">VillasVillas</a></li>
      <li class="nav-item"><a href="" class="nav-link">Guest house</a></li>
      <li class="nav-item"><a href="" class="nav-link">Explore the World</a></li>
      <li class="nav-item"><a href="" class="nav-link">Last Minitues Trips</a></li>
        <li class="nav-item"><a href="" class="nav-link">Solo trips</a></li>


      <li class="nav-item hotels"><a data-toggle="collapse" data-target="#demo" href="" class="hotels_link nav-link">Make a reservation</a></li>
      <li class="nav-item "><a href="" class="hotels_link nav-link" >Plan a trip</a></li>
       
     </ul>
      
    
  </div>
</div>
<!--top menu-->



<!-- start search collapse -->
<div class="col-12  text-center" id="search_collapse" > 
 
<div id="demo" class="collapse mb-3" style="background-color: #FF6F56;padding-top:40px;padding-right:-150px;border-radius: 5px;">

  <div class="row">
  <div class="col-3">
    <p class="text-center b">Where</p>
  </div>

  <div class="col-3">
    <p class="text-center b">When</p>
  </div>

  <div class="col-3">
    <p class="text-center b">What</p>
  </div>


 </div>
 <hr class="h3" style="background-color:grey ">
  <form action="footer.php" class="form-inline" style="background-color: #FF6F56;border-radius: 5px;padding: 10px;padding-bottom:50px;adding-right: 150px;" >
   <div class="col-3 form-group">
  <input type="text" class="form-control mb-1 mr-sm-2" name="" placeholder="Location/ city / property">
 </div>

 <div class="col-3 form-group">

  <input type="date" class="form-control mb-1 mr-sm-2 " name="" placeholder="Check out date">
 </div>

 <div class="col-3 form-group">
  
   <input type='date' class="form-control mb-1 mr-sm-2 "/>
     
       
    </div>
    <div class="col-3 mb-3 form-group">
  <input type="text" class="form-control mb-1 mr-sm-2" name="" placeholder="Room">
 </div>
<div class="form-group col-sm-11 text-center">
<input type="submit" value="Search" class="form-control btn btn-success btn-block">
</div>
 </form>

</div>
 </div>
<!-- start search collapse -->








<!-- login Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
      
        <h5 class="modal-title text-center mb-2" id="exampleModalLabel"> <i>Customer Login</i></h5>
       <i style="color: white;"> <button type="button"  class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button></i>
      </div>
      <div class="modal-body">
       <div class="form-group">
         <div class="input-group mb2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-envelope"></i>
              
            </div>
          </div>
          <input type="text" name="email" class="form-control" placeholder="Enter your Email">
         </div>
       </div>


       <div class="form-group">
         <div class="input-group mb2">
          <div class="input-group-prepend">
            <div class="input-group-text"><i class="fa fa-lock"></i>
              
            </div>
          </div>
          <input type="text" name="pwd" class="form-control" placeholder="Enter your password">
         </div>
       </div>


       <div class="custom-control custom-checkbox">
         <div class="mb-2">
                    <input type="checkbox" name="name" class="custom-control-input" placeholder="Enter your name" id="terms_c"><label for="terms_c" class="custom-control-label mb-3"><i class="mb-5">Remember me</i></label>
         </div>
       </div>


        <div class="form-group">
         <div class="input-group mb2">
          
          <input type="submit" class="btn btn-success ribbon  btn-block" value="submit" class="form-control">
         </div>
       </div>


      
      </div>
      <div class="modal-footer">

        <div>
  <p><i>Dont have account?<i>&nbsp;&nbsp;&nbsp; <a href="" class="">sign-up</a></p>
</div>
      </div>
    </div>
  </div>
</div>

