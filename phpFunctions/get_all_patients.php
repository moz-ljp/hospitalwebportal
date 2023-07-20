<?php

include("../navbar.php");
include("make_connection.php");

function getAllPatients()
{
    
    $conn = makeConnection();
    
    if($conn != "false")
    {
        $sql = "SELECT * FROM Patients";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Username: " . $row["Username"]. " FirstName:" . $row["FirstName"]."<br>";
        }
        } else {
        echo "0 results";
        }
        $conn->close();
    }

    
}

getAllPatients();

?>

