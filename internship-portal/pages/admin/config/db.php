<?php
    $con = mysqli_connect("localhost:4306","root","","internship_portal");
    if(!$con){
        die('Connection Failed'.mysqli_connect_error());
    }else{
        echo "";
    }
?>