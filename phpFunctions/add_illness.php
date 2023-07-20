<?php
include_once("make_connection.php");
include_once("verify_staff_account.php");

function addIllness($name, $severity, $notes, $staffUsername, $staffFirstName, $staffLastName)
{

    if(verifyStaff($staffUsername, $staffFirstName, $staffLastName))
    {
        $conn = makeConnection();
    
        if($conn != "false")
        {
            $stmt = $conn->prepare("INSERT INTO Illness
            (Name, Severity, Notes, Staff_Username) VALUES (?,?,?,?)");

            $stmt->bind_param("ssss", $name, $severity, $notes, $staffUsername);

            try{
                $stmt->execute();
            }
            catch(Exception $ex)
            {
                
                $errCode = $ex->getCode();
                $errMessage = "Sorry, an unexpected error occured";
                return($errMessage);
                
            }
        
            

            if($stmt)
            {
                return true;
            }

            $conn->close();
        }

    
    }
    else
    {
        return 99; //the person trying to add an illness is not verified to be staff.
    }
}

?>