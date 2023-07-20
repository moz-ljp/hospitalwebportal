<?php
include_once("make_connection.php");

function findPrescriptionID($username, $illness)
{
    
    $conn = makeConnection();
    
    if($conn != "false")
    {
        $sql = "SELECT PrescriptionID FROM Prescriptions WHERE Patients_Username = '$username' and Illness = '$illness'";

        try{
            //$result = $stmt->execute();
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // output data of each row
                //$arrayResult[] = $result->fetch_array();
                while($row = $result->fetch_Array())
                {
                    $arrayResult[] = $row;
                }
                } else {
                return(0);
            }
            
        }
        catch(Exception $ex)
        {
            
            return($ex->getMessage());
            
        }

        return($arrayResult[0][0]);
        $conn->close();
        
    }

    

    
}

?>

