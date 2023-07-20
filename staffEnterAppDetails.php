<?php
require("navbar.php");
include_once("phpFunctions/staff_create_appointment.php");

if(isset($_POST['submit']))
{
    $date = $_GET['date'];
    $username = $_GET['selected'];
    
    $result = makeAppointment($username, $date, $_POST['details'], $_SESSION['staffAccount']['Username']);

    header("Location: staffPortal.php?booked=true");

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

<div class="row" style="margin-top:20px; width:40%; margin-left:30%">

        <?php if(isset($username)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Your account has been created and your username has been automatically filled.
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif; ?>

    </div>

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">


</div>

    <div class="row" >
        <div class="formContainer" style="margin-top:60px;">
        <h2 style="text-align:center; color:white; margin-bottom:50px;">Enter Details</h2>
            <form method="post" autocomplete="on">
                <div class="formBox">

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="username" class="fontLabel"> Details </label>
                            </div>
                            <div class="col-sm-6">
                                <textarea name="details" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow" style="margin-top:50px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-success" type="submit" name="submit">Confirm Booking</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    

</div>
        </body>