<?php
include("make_connection.php");

function findFreeDoc()
{
    
    $conn = makeConnection();
    
    if($conn != "false")
    {
        $sql = "SELECT * FROM Appointments WHERE Patients_Username != '' ORDER BY Staff_Username DESC";

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

        return($arrayResult[rand(0,count($arrayResult))]['Staff_Username']);
        $conn->close();
        
    }

    

    
}

?>

