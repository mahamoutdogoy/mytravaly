 <?php
    session_start();
    if(session_destroy()) // Destroying All Sessions
    {
    header("Location:../hotellogin.php"); // Redirecting To Home Page
    }
    ?>