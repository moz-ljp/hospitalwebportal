<?php

include_once("hash_password.php");
include_once("make_connection.php");

function staffSignUp($username, $firstname, $lastname, $password)
{

    $password = hashPassword($password);

    $conn = makeConnection();
    
    if($conn != "false")
    {
        $stmt = $conn->prepare("INSERT INTO Staff
         (Username, FirstName, LastName, PasswordHash) VALUES (?,?,?,?)");

        $stmt->bind_param("ssss", $username, $firstname, $lastname, $password);

        try{
            $stmt->execute();
        }
        catch(Exception $ex)
        {
            
            $errCode = $ex->getCode();
            return($ex->getMessage());
            
        }
    
        

        if($stmt)
        {
            return true;
        }

        $conn->close();
    }
}

?>