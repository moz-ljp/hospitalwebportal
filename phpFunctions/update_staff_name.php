<?php
include_once("make_connection.php");

function updateStaffName($username, $firstname, $lastname) 
{
    $conn = makeConnection();

    
    if($conn != "false")
    {   

        $sql = "UPDATE Staff SET FirstName = '$firstname', LastName = '$lastname' WHERE Username = '$username'";

        try{
            //$result = $stmt->execute();
            $result = $conn->query($sql);
            return($result);
        }
        catch(Exception $ex)
        {
            
            return($ex->getMessage());
        }
        

        $conn->close();
    }
}

?>