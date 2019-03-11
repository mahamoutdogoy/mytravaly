
<?php

include 'Property_DB.php';
    $query=mysqli_query($con,"update images set image_type='$_POST[imgtype]' where image_id='$_POST[imgid]'");
    
 ?>