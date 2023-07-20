<?php

include_once("make_connection.php");
require("../navbar.php");

function generateAppointments()
{

    $conn = makeConnection();

    $currentDate = date("Y/m/d H:i", mktime(8,0,0,2,13,2023));
    echo $currentDate;
    echo "<br>";

    $endDate = mktime(8,0,0,12,31,2023);
    $endDate = date("Y/m/d H:i", $endDate);
    echo $endDate;
    echo "<br>";

    //$newDate = date("Y/m/d h:i", strtotime($currentDate. '+30 minutes'));
    $newDate = $currentDate;
    echo $newDate;

    if($conn != "false")
    {
        
        while($newDate != $endDate)
        {
            $stmt = $conn->prepare("INSERT INTO Appointments
         (DateTime) VALUES (?)");

        $stmt->bind_param("s", $newDate);

        $newDate = date("Y/m/d H:i", strtotime($newDate. '+30 minutes'));

        if(DateTime::createFromFormat("Y/m/d H:i", $newDate)->format('H') < 17 and DateTime::createFromFormat("Y/m/d H:i", $newDate)->format('H') > 7)
        {
            try{
                $stmt->execute();
            }
                catch(Exception $ex)
                {
                    
                    return false;
                    
                }
        }
        }
    
        

        if($stmt)
        {
            return true;
        }
        

        $conn->close();
    }
}

generateAppointments();

?>