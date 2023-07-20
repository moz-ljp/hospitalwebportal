<?php

include_once("make_connection.php");

function getDiagnosis(string $username)
{
    $conn = makeConnection();
    
    if($conn != "false")
    {

        $sql = "SELECT Appointments.DateTime, Appointments.Details, Prescriptions_PrescriptionID, Illness_Name, Severity, Notes FROM Diagnosis 
        INNER JOIN Appointments ON (Appointments.AppointmentID = Diagnosis.Appointments_AppointmentID)
        WHERE Diagnosis.Patients_Username = '$username'
        ORDER BY Appointments.DateTime";

        //$stmt = $conn->prepare("SELECT * FROM Patients WHERE Username = ? AND PasswordHash = ?");

        //$stmt->bind_param("ss", $username, $passord);


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

        
        /*
        if($stmt)
        {
            return true;
        }
        */

        return $arrayResult;

        $conn->close();
    }
}

?>