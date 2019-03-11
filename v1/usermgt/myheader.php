 
<link rel="stylesheet" type="text/css" href="main.css">
<link rel="icon" href="fav.png" type="image/png" sizes="16x16">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="main.css">

    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

 <nav class="navbar navbar-expand-md">
     <div class="container-fluid">
       <a href="" class="navbar-brand text-uppercase"></a>
       <!-- <h1 class="hh">Admin Dashboard</h1> -->
       <img src="images/logo1.png" alt="">

       <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#myNavbar">
            <span class="navbar-toggler-icon"></span>
       </button>
       


          <!---------- nav icons ----------->


         <ul class="navbar-nav icons">

            <li class="nav-item mr-4">

                <a href="#" class="nav-link">

                 <i class="fa fa-search"></i>
                </a>
            </li>


            <li class="nav-item mr-4">

                    <a href="#" class="nav-link">
                
    
                        <i class="fa fa-bell icon"></i>
                        
                    </a>
             </li>

                <li class="nav-item mr-4">

                     <a href="#" class="nav-link">
        
                            <i class="fa fa-comment icon"></i>
                        </a>
                    </li>


                    <li class="nav-item mr-5">

                        <a href="#" class="nav-link">

                            <img src="images/team.jpg" width="40" alt="image" class="img-fluid rounded-circle img-thumbnail">
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link" data-toggle="modal" data-target="#sign-out">

                            <i class="fa fa-sign-out-alt"></i>
                            Sign Out
                        </a>
                    </li>
         </ul>

       </div>
       
     </div>

 </nav>


<div class="modal fade" id="sign-out">
    <div class="modal-dialog">
        <div class="modal-content">

            <!------------------------- modal header ------------------------>

            <div class="modal-header">

                <h4 class="modal-title">Already want to leave?</h4>

                <button type="button" class="close" data-dismiss="modal"
                >&times;</button>
            </div>

            <!--------------------------------- modal body --------------------->

            <div class="modal-body">
                It is sad to see you go . Please press logout to leave
            </div>

            <!-------------------------- modal footer ------------------------>
             <div class="modal-footer">

                <button class="btn btn-primary" type="button" data-dismiss="modal">Stay Here</button>
                <!-- <button class="btn btn-danger" formaction="../index.php" type="button"  data-dismiss="modal">Log out</button> -->

                <a href="logout.php" class="btn btn-danger">
                     log out</a>
             </div>


        </div>
    </div>


 </div>

 
 <!-----------  the modal --------------->
 

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <!-- chart js -->
    

    <!------------- toggler button --------------------------->
    <script>
      $(".navbar-toggler").html(
        '<i class="fa fa-arrow-down fa-3x text-red"></i>'
      );
    </script>