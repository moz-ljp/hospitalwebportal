<?php
include_once("make_connection.php");

function enableStaff($username)
{
    $conn = makeConnection();
    
    if($conn != "false")
    {

        $sql = "UPDATE Staff SET Enabled = 1 WHERE Username = '$username'";

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