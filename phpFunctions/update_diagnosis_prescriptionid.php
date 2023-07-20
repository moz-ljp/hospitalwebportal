<?php
include_once("make_connection.php");

function updateDiagnosisPrescriptionID($patientUsername, $illness, $prescriptionID) 
{
    $conn = makeConnection();

    
    if($conn != "false")
    {

        $sql = "UPDATE Diagnosis SET Prescriptions_PrescriptionID = '$prescriptionID' WHERE Patients_Username = '$patientUsername' AND Illness_Name = '$illness'";

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