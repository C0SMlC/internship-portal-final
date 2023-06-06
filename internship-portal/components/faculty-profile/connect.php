<?php

session_start();
$dbhost = "localhost";
$dbuser = "root";
$dbpassword = "";
$dbname = "internship_portal";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpassword, $dbname))
{
    die("Failed to connect");
}


if($_SERVER['REQUEST_METHOD'] == "POST"){

    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $mobile = $_POST['mobile'];
    $address = $_POST['address'];

    if(!empty($fullName) && !empty($email) && !empty($age) && !empty($mobile) && !empty($address) && !is_numeric($fullName))
    {
        if(preg_match("/^([0-9]{10})$/", $mobile))
        {
            if(preg_match("/^([0-9]{2})$/", $age))
            {
        
                $query = "insert into faculty_panel(fac_name, fac_email, fac_age, fac_mobile, fac_address) values('$fullName', ' $email', '$age', '$mobile', '$address') ";
                
                if(mysqli_query($con, $query))
                {
                    echo "Saved";
                }else{
                    echo "error". mysqli_error($con);
            
                }
                header("Location:index_edit.php");
                die;
            }
            else
            {
                echo 'Enter valid age';
            }
        }else{
            echo ' Enter valid phone no.';
        }
    }else
    {
        echo "Please enter valid information";
    }
}

function update_data($con){
       
   global $fullName, $email, $age, $mobile, $address;
   $query = "select * from tpo where fac_name = '$fullName' AND fac_email = '$email' AND fac_age = '$age' AND fac_mobile = '$mobile' AND fac_address = '$address'";
   $result = mysqli_query($con,$query);
    if($result && mysqli_num_rows($result) > 0){
        $update = mysqli_fetch_assoc($result);
        return $update;
    }else{
        echo "No matching user found";
    } 

}
?>
