<?php
require("navbar.php");
require("adminPortalFooter.php");
include_once("phpFunctions/get_all_patients_array.php");

if(isset($_SESSION['staffAccount']))
{
    $loggedIn = 1;
}

if($loggedIn)
{
    $patientList = getAllPatients();
}

if(isset($_POST['submit']))
{

    $firstname = "";
    $lastname = "";
    $username = "";

    if(isset($_POST['FirstName']))
    {
        $firstname = $_POST['FirstName'];
    }
    if(isset($_POST['LastName']))
    {
        $lastname = $_POST['LastName'];
    }
    if(isset($_POST['Username']))
    {
        $username = $_POST['Username'];
    }


    for($i=0; $i<count($patientList);$i++)
    {
        $resultArray = [];
        $added = false;
        if(isset($username) and !$added and strlen($username) > 0)
        {
            if($username == $patientList[$i]['Username'])
            {
                $resultArray[] = $patientList[$i];
                $added = true;
            }
        }
        if(isset($firstname) and !$added and strlen($firstname) > 0)
        {
            if($firstname == $patientList[$i]['FirstName'])
            {
                $resultArray[] = $patientList[$i];
                $added = true;
            }
        }
        if(isset($lastname) and !$added and strlen($lastname) > 0)
        {
            if($lastname == $patientList[$i]['LastName'])
            {
                $resultArray[] = $patientList[$i];
                $added = true;
            }
        }

        if(count($resultArray) > 0)
        {
            $patientList = $resultArray;
        }
        

    }

}


?>

<style>

body{
    background-image: url('images/signupback.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  width: 100%;
  height: 100%;
}

.styled-table {
    border-collapse: collapse;
    margin: 25px 0;
    font-size: 0.9em;
    font-family: sans-serif;
    min-width: 400px;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
}

.styled-table thead tr {
    background-color: #009879;
    color: #ffffff;
    text-align: left;
}

.styled-table th,
.styled-table td {
    padding: 12px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #f3f3f3;
}

.styled-table tbody tr:nth-of-type(odd) {
    background-color: lightblue;
}

.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: #009879;
}

.functionsLayout
{
    margin-bottom:20px;
    width:50%;
    margin-left: auto;
    margin-right: auto;
}

.functionsHeader
{
    color:white;
    text-align:center;
}

.boxContainer
{
    border: white 2px solid;
    border-radius: 5px;
}

</style>

<body>
    <div class="main">

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">

            <?php if(isset($_GET['enabled'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                The account was enabled.
                <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php endif; ?>

    </div>

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">

            <?php if(isset($_GET['disabled'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                The account was disabled.
                <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php endif; ?>

    </div>

    <div class="row" style="margin-top:10px; width:40%; margin-left:30%">

            <?php if(isset($_GET['failed'])): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Something went wrong.
                <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php endif; ?>

    </div>

    <div class="row" style="margin-top:10px; width:40%; margin-left:30%">

            <?php if(isset($_GET['newDoctorUsername'])): ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                The new doctor's username is <?php echo $_GET['newDoctorUsername'] ?>
                <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <?php endif; ?>

    </div>


        <div class="row">
           
            <div class="col-sm-6">
                <div class="boxContainer" style="margin-top:10px; margin-left:50px; height:200%">
                <h2 class="functionsHeader">Your Staff</h2>
                <table class="styled-table" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Name</th>
                            <th>Select</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php for($i=0; $i<count($patientList); $i++ ){if(count($patientList) > 0){ ?>
                        <tr>
                            <td><?php echo $patientList[$i]["Username"]; ?></td>
                            <td><?php echo $patientList[$i]["FirstName"]." ".$patientList[$i]["LastName"];?></td>
                            <td><a href="staffEnterAppDetails.php?selected=<?php echo $patientList[$i]["Username"]."&date=".$_GET['date']?>" class="btn btn-success">Select</a></td>
                        </tr>
                        <?php }}?>
                    </tbody>
                </table>
                </div>
            </div>

            <div class="col-sm-4">
            <div class="boxContainer" style="margin-top:10px; margin-left:100px; height:200%; ">
                
                <form method="post">
                <h2 class="functionsHeader" style="margin-top:50px">Search</h2>
                <div class="row functionsLayout">
                
                    <div class="col-sm-3">
                        <label style="color:white">First Name:</label><br />
                        <input type="text" name="FirstName" class="form-control" style="width:200px">
                    </div>
                </div>
                <div class="row functionsLayout">
                
                    <div class="col-sm-3">
                        <label style="color:white">Last Name:</label><br />
                        <input type="text" name="LastName" class="form-control" style="width:200px">
                    </div>
                </div>
                <div class="row functionsLayout">
                
                    <div class="col-sm-3">
                        <label style="color:white">Username:</label><br />
                        <input type="text" name="Username" class="form-control" style="width:200px">
                    </div>
                </div>

                <div class="row functionsLayout">
                    <button class="btn btn-success" type="submit" name="submit">Submit</button>
                </div>
                <div class="row functionsLayout">
                    <button class="btn btn-danger" type="reset" name="reset">Reset</button>
                </div>
                <div class="row functionsLayout">
                    <button class="btn btn-warning" type="submit" name="submit">Clear Filters</button>
                </div>

                </form>
                
            </div>

            </div>

        </div>
        

    </div>
</body>