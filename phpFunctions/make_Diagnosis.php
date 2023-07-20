<?php

include_once("make_connection.php");

function makeDiagnosis($appointmentID, $patientUsername, $staffUsername, $illnessName, $severity, $diagnosisNotes)
{
    $conn = makeConnection();
    
    if($conn != "false")
    {

        
        $stmt = $conn->prepare("INSERT INTO Diagnosis
         (Appointments_AppointmentID, Patients_Username, Staff_Username, Illness_Name, Severity, Notes) VALUES (?,?,?,?,?,?)");

        $stmt->bind_param("isssss", $appointmentID, $patientUsername, $staffUsername, $illnessName, $severity, $diagnosisNotes);

        try{
            $stmt->execute();

            $sql = "UPDATE Appointments SET Completed = 1 WHERE AppointmentID = '$appointmentID'";

            try{
                //$result = $stmt->execute();
                $result = $conn->query($sql);
                return($result);
            }
            catch(Exception $ex)
            {
                
                return($ex->getMessage());
            }
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