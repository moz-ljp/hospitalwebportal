<?php

include_once("make_connection.php");

function getStaffDiagnosis(string $username)
{
    $conn = makeConnection();
    
    if($conn != "false")
    {

        $sql = "SELECT Patients.FirstName, Patients.LastName, Patients.Username, Diagnosis.Illness_Name, Diagnosis.Severity, Diagnosis.Notes, DiagnosisID
        FROM Diagnosis
        INNER JOIN Patients ON (Patients.Username = Diagnosis.Patients_Username)
        WHERE Staff_Username = '$username' AND Prescriptions_PrescriptionID IS NULL";

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