<?php

function checkConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "NH2X1Er!h3mFTAjz";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

return("Connection Successful");

}

include("../navbar.php");

$result = checkConnection();

?>

<h1><?php echo $result ?></h1>