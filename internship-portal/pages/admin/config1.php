<?php
define("DB_SERVER", "localhost:4306");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "");
define("DB_NAME", "internship_portal");

# Connection
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

# Check connection
if (!$link) {
  die("Connection failed: " . mysqli_connect_error());
}
