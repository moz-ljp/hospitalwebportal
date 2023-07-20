<?php

include("make_connection.php");


function getIllness(string $illnessID)
{

    $conn = makeConnection();
    
    if($conn != "false")
    {
        $sql = "SELECT * FROM Illness WHERE Name ='$illnessID'";
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
