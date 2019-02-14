<?php

	$con1=mysql_connect("localhost","root","");
    mysql_select_db("trial",$con1);
    $query=mysql_query("update photo set type='$_POST[imgtype]' where id='$_POST[imgid]'");
    
 ?>