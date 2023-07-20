<?php

include_once("make_connection.php");
include_once("getPrescriptionIDByNameAndIllness.php");
include_once("update_diagnosis_prescriptionid.php");

function makePrescription($patientUsername, $medicationName, $illness, $prescriptionLength, $startDate, $notes)
{
    $conn = makeConnection();
    
    if($conn != "false")
    {
        $stmt = $conn->prepare("INSERT INTO Prescriptions
         (Patients_Username, MedicationName, Illness, PrescriptionLength, StartDate, UsageNotes) VALUES (?,?,?,?,?,?)");

        $stmt->bind_param("ssssss", $patientUsername, $medicationName, $illness, $prescriptionLength, $startDate, $notes);

        try{
            $stmt->execute();
            $presID = findPrescriptionID($patientUsername, $illness);
            updateDiagnosisPrescriptionID($patientUsername, $illness, $presID);
            return(1);
            
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