<?php

include_once("make_connection.php");

function genUsername($firstname, $lastname)
{

    $usernameCreated = false;
    while($usernameCreated == false)
    {
        $p1 = substr($firstname, 0, 3);
        $p2 = substr($lastname, -2);
        $numbers = rand(10,99);
        $username = $p1.$p2.$numbers;
    
        //validate the username does not already exist
        $conn = makeConnection();
        
        if($conn != "false")
        {
            $sql = "SELECT * FROM Patients WHERE Username ='$username'";
            $result = $conn->query($sql);
    
            if ($result->num_rows > 0) {
            // output data of each row
            $usernameCreated = false;
            } else {
            $usernameCreated = true;
            }
            $conn->close();
    
        }
    }

    if($usernameCreated)
    {
        return($username);
    }
    else{
        return("FAIL");
    }
    

}