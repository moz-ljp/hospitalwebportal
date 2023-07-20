<?php
include_once("find_staff_with_least_appointments.php");
include_once("make_connection.php");

function makeAppointment($patientUsername, $date, $details, $staffUsername)
{
    $conn = makeConnection();
    
    if($conn != "false")
    {

        $sql = "UPDATE Appointments SET Patients_Username = '$patientUsername', Staff_Username = '$staffUsername', Details = '$details' WHERE Patients_Username = ' ' AND DateTime = '$date'";

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