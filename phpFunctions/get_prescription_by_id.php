<?php

include("make_connection.php");


function getPrescription(string $prescriptionID)
{

    $conn = makeConnection();
    
    if($conn != "false")
    {
        $sql = "SELECT * FROM Prescriptions WHERE PrescriptionID ='$prescriptionID'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        $result = $result->fetch_assoc();
        return($result);
        } else {
        echo "0 results";
        }
        $conn->close();

    }


}
?>
