<?php
include_once("make_connection.php");

function cancelAppointment($id)
{
    $conn = makeConnection();
    
    if($conn != "false")
    {

        //$sql = "DELETE FROM Appointments WHERE AppointmentID = '$id' AND Completed = 0";
        $sql = "UPDATE Appointments SET Patients_Username = '', Staff_Username = '', Details = '', Patients_Username = ''  WHERE AppointmentID = '$id' AND Completed = 0    ";

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