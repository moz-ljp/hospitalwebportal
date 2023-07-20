<?php

//root at 127.0.0.1: xzH(Xu_V9mo0QS2u
//root at localhost: NH2X1Er!h3mFTAjz

function makeConnection()
{
    $servername = "localhost";
    $username = "root";
    $password = "NH2X1Er!h3mFTAjz";
    $dbname = "hospitalmanagementsystem";


try{
  // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
  return("false");
}
}
catch(Exception $ex)
{
  return(0);
}

return($conn);
}