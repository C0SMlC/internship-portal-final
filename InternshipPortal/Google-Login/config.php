<?php

//start session on web page
session_start();


//tryyyyyyy

//tryyyyyyy


// $hostname = "localhost:4306";
// $username = "root";
// $password = "";
// $database = "internship_portal";

// $conn=mysqli_connect("localhost:4306","root","","internship_portal");

// // Check connection
// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

//config.php

//Include Google Client Library for PHP autoload file
require_once 'vendor/autoload.php';

//Make object of Google API Client for call Google API
// $google_client = new Google_Client();

// //Set the OAuth 2.0 Client ID
// $google_client->setClientId('374443591875-7nl8m8ct4hoo5cqpgq4jbjk9v4k1f6ja.apps.googleusercontent.com');

// //Set the OAuth 2.0 Client Secret key
// $google_client->setClientSecret('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');

// //Set the OAuth 2.0 Redirect URI
// $google_client->setRedirectUri('http://localhost/Google%20Login%20Final/index.php');

// // to get the email and profile 
// $google_client->addScope('email');

// $google_client->addScope('profile');

$clientID='374443591875-7nl8m8ct4hoo5cqpgq4jbjk9v4k1f6ja.apps.googleusercontent.com';
$ClientSecret='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';
$RedirectUri='http://localhost/InternshipPortal/pages/student/';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($ClientSecret);
$client->setRedirectUri($RedirectUri);
$client->addScope("email");
$client->addScope("profile");

// $userinfo=[];
// $first_name=[];
// $last_name=[];
// $email=[];
// $full_name=[];
// $token="";
// $verifiedEmail="";
// $gender="";
// $picture="";

if(isset($u_email)|| isset($firstname) || isset($lastname) || isset($fullname) || isset($u_gender) || isset($pro_pic) || isset($ver_email) || isset($u_token)){
$u_email=$userinfo['email'];
$firstname= $userinfo['first_name'];
$lastname= $userinfo['last_name'];
$fullname=$userinfo['full_name'];
$u_gender=$userinfo["gender"];
$pro_pic=$userinfo['picture'];
$ver_email=$userinfo['verifiedEmail'];
$u_token=$userinfo['token'];
}

$u_email="";
$firstname="";
$lastname="";
$fullname="";
$u_gender="";
$pro_pic="";
$ver_email="";
$u_token="";





//JUST TRYING
$servername = "localhost:4306";
$database = "internship_portal";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
else{
	echo "Your DB is connected!";
}



//mysqli_close($conn);
//$sql = "INSERT INTO users ( first_name, last_name,full_name,email, gender, picture, verifiedEmail, token) VALUES ('{$userinfo['email']}', '{$userinfo['first_name']}', '{$userinfo['last_name']}', '{$userinfo['gender']}', '{$userinfo['full_name']}', '{$userinfo['picture']}', '{$userinfo['verifiedEmail']}', '{$userinfo['token']}')";

 $sql = "INSERT INTO user ( firstname, lastname,fullname,u_email, u_gender, pro_pic,u_token,ver_email) VALUES ('$firstname', '$lastname','$fullname', '$u_gender','$u_email', '$pro_pic', '$ver_email', '$u_token')";
 
// $sql= "INSERT INTO user (urshi','dub','urshidub','asv@gmail.com','female','','123456','')";
//  $sql="select email from users";
//  $result=$conn->query($sql);
//  while($row=mysqli_fetch_assoc($result)){
//   $string_values=$row['email'];
//   $userinfo=explode(",",$string_values);
//   print_r($userinfo);
// }

 



if ($conn->query($sql) === TRUE) {
  echo " 1 New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}



$conn->close();



?>
   

