<?php
require("navbar.php");
include_once("phpFunctions/validate_password.php");
include_once("phpFunctions/validate_email.php");
include_once("phpFunctions/generate_username.php");
include_once("phpFunctions/patient_signup.php");

$passwordValidated = true;
$emailValidated = true;
$allFieldsPopulated = true;

if(isset($_POST['submit']))
{
    
    if($_POST['password'] == $_POST['confirmPassword'])
    {
        $passwordValidated = validatePassword($_POST['password']);
    }
    else{
        $passwordValidated = false;
    }

    if(validateEmail($_POST['email']))
    {
        $emailValidated = true;
    }
    else
    {
        $emailValidated = false;
    }

    if($_POST['firstname'] != null and $_POST['lastname'] != null and $_POST['email'] != null and $_POST['dob'] != null and $_POST['address'] != null and $passwordValidated and $emailValidated)
    {
        $username = genUsername($_POST['firstname'], $_POST['lastname']);
        $result = patientSignUp($username, $_POST['firstname'], $_POST['lastname'], $_POST['email'], $_POST['dob'], $_POST['address'], $_POST['password']);
        if($result == 1)
        {
            header('Location: login.php?username='.$username);
        }
        else{
            $errMessage = $result;
        }
    }
    else{
        $allFieldsPopulated = false;
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

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">

        <?php if(!$allFieldsPopulated and $passwordValidated): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Please ensure you fill out all of the fields.
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif; ?>

    </div>

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">

        <?php if(isset($errMessage) and $passwordValidated and $allFieldsPopulated): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?php echo $errMessage ?>
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif; ?>

    </div>

    <div class="row" >
        <div class="formContainer" style="margin-top:60px;">
        <h2 style="text-align:center; color:white;">Sign Up</h2>
            <form method="post" autocomplete="on" >
                <div class="formBox">

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="firstname" class="fontLabel"> First Name: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="minEntryWidth" placeholder="Joe" name="firstname">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="lastname" class="fontLabel"> Last Name: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="minEntryWidth" placeholder="Bloggs" name="lastname">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="email" class="fontLabel"> Email: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="email" class="minEntryWidth" placeholder="you@gmail.com" name="email">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="dob" class="fontLabel"> DOB: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="date" class="minEntryWidth" placeholder="" name="dob">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="address" class="fontLabel"> Address: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="address" class="minEntryWidth" placeholder="" name="address">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label id="password" for="password" class="fontLabel"> Password: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="minEntryWidth" placeholder="" name="password">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="confirmPassword" class="fontLabel"> Confirm Password: </label>
                            </div>
                            <div class="col-sm-6">
                                <input id="confirmPassword" type="password" class="minEntryWidth" placeholder="" name="confirmPassword">
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