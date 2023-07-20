<?php
require("navbar.php");
include_once("phpFunctions/patient_cancel_appointment.php");

$loggedIn = 0;
if(isset($_SESSION['staffAccount']))
{
    $loggedIn = 1;
}

if(isset($_POST['submit']) and $loggedIn)
{
    $result = cancelAppointment($_GET['id']);

    if($result == 1)
    {
        header("Location: staffPortal.php?cancelled");
    }
    else
    {
        header("Location: staffPortal.php?failed");
    }
}


?>

<style>
    .formContainer{
    background: #2d3e3f;
	width: 450px;
	height: 450px;
	padding-bottom: 20px;
	position: absolute;
	top:45%;
	left: 50%;
	transform: translate(-50%, -50%);
	margin: auto;
    padding: 70px 50px 20px 50px;
}

.formContainer .formBox{
    width: 360px;
	height: 35px;
	margin-top: 10px;
	font-family:Arial, Helvetica, sans-serif;
	font-size: 14px;
}

.formContainer .fontLabel
{
    color: white;
}

.entryRow{
    margin-bottom:10px;
}

.minEntryWidth
{
    width:160px;
}

body{
    background-image: url('images/signupback.png');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  width: 100%;
  height: 100%;
}

</style>

<body>
<div class="main">

    <form method="post" autocomplete="on">
        <center>
        <h2 style="color:white; margin-top:15%">Are you sure?</h2>
        <button name="submit" class="btn btn-danger">Cancel the Appointment</button></center>

    </form>

</div>
</body>