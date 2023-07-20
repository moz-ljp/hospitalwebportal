<?php
require("navbar.php");
include_once("phpFunctions/validate_password.php");
include_once("phpFunctions/validate_email.php");
include_once("phpFunctions/get_staff_by_username.php");
include_once("phpFunctions/update_staff_name.php");

$passwordValidated = true;
$emailValidated = true;
$allFieldsPopulated = true;

$staffArray = getStaffByUsername($_GET['username']);

if(isset($_POST['submit']))
{
    if(isset($_POST['firstname']) and isset($_POST['lastname']) and isset($_GET['username']))
    {
        $result = updateStaffName($_GET['username'], $_POST['firstname'], $_POST['lastname']);
        if($result != 0)
        {
            header("Location: adminPortal.php?updated");
        }
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

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">

        <?php if(!$passwordValidated): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Your password isn't valid. It requires uppercase, lowercase, numbers and symbols, and they must match.
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif; ?>

    </div>

    <div class="row" >
        <div class="formContainer" style="margin-top:60px;">
        <h2 style="text-align:center; color:white;">Edit Account</h2>
            <form method="post" autocomplete="on" >
                <div class="formBox">

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="firstname" class="fontLabel"> First Name: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="minEntryWidth" placeholder="Joe" name="firstname" value="<?php echo $staffArray["FirstName"]?>">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="lastname" class="fontLabel"> Last Name: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="minEntryWidth" placeholder="Bloggs" name="lastname" value="<?php echo $staffArray["LastName"]?>">
                            </div>
                        </div>
                    </div>

                    <br />

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-success" type="submit" name="submit">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    

</div>
        </body>