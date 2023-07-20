<?php

include("make_connection.php");

if(isset($_POST['username']))
{
    $result = (getPatientByUsername($_POST['username']));

    echo $result["Username"]."<br />";
    echo $result["FirstName"]."<br />";
    echo $result["LastName"]."<br />";
    echo $result["EmailAddress"]."<br />";
    echo $result["Address"]."<br />";
}

function getPatientByUsername(string $username)
{

    $conn = makeConnection();
    
    if($conn != "false")
    {
        $sql = "SELECT * FROM Patients WHERE Username ='$username'";
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

<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">

    <input type="text" placeholder="Username" name="username">
    <button type="submit">Submit</button>

</form>