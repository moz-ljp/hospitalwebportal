<?php
include_once("make_connection.php");

function verifyStaff(string $username, string $firstname, string $lastname)
{

    $conn = makeConnection();
    
    if($conn != "false")
    {

        $sql = "SELECT * FROM Staff WHERE Username = '$username' AND FirstName = '$firstname' AND LastName = '$lastname' AND Enabled = 1";

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

}

?>