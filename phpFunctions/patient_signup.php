<?php

include_once("hash_password.php");
include_once("make_connection.php");

function patientSignUp($username, $firstname, $lastname, $email, $dob, $address, $password)
{

    $password = hashPassword($password);

    $conn = makeConnection();
    
    if($conn != "false")
    {
        $stmt = $conn->prepare("INSERT INTO Patients
         (Username, FirstName, LastName, EmailAddress, Address, PasswordHash, DOB) VALUES (?,?,?,?,?,?,?)");

        $stmt->bind_param("sssssss", $username, $firstname, $lastname, $email, $address, $password, $dob);

        try{
            $stmt->execute();
        }
        catch(Exception $ex)
        {
            
            $errCode = $ex->getCode();
            if($errCode = "1062")
            {
                $errMessage = "Sorry, that email is already in use";
                return($errMessage);
            }
            else{
                $errMessage = "Sorry, an unexpected error occured";
                return($errMessage);
            }
            
        }
    
        

        if($stmt)
        {
            return true;
        }

        $conn->close();
    }
}

?>