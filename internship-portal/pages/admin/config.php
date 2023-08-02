<?php
$con=mysqli_connect("localhost","root","","internship_portal");
if($con){
    echo "";
}else{
    echo "Connection".mysqli_connect_error();
}


?>