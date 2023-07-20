<?php

include_once("hash_password.php");
include_once("make_connection.php");

function patientLogin(string $username, string $password)
{
    $password = hashPassword($password);

    try
    {
        $conn = makeConnection();
    }
    catch(Exception $ex)
    {
        return(0);
    }
    
    
    if($conn != 0)
    {

        $sql = "SELECT * FROM Patients WHERE Username = '$username' AND PasswordHash = '$password'";

        //$stmt = $conn->prepare("SELECT * FROM Patients WHERE Username = ? AND PasswordHash = ?");

        //$stmt->bind_param("ss", $username, $passord);


        try{
            //$result = $stmt->execute();
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                $row = $result->fetch_array();
                return($row);
                } else {
                return(0);
            }
            
        }
        catch(Exception $ex)
        {
            
            return($ex->getMessage());
            
        }

        
        /*
        if($stmt)
        {
            return true;
        }
        */

        $conn->close();
    }
    else
    {
        return("DB Error");
    }

}

?>