<?php
require("navbar.php");
include_once("phpFunctions/add_illness.php");

if(isset($_SESSION['staffAccount']))
{
    $loggedIn = 1;
}
else
{
    header("Location: staffLogin.php?needLogin=1");
}

if(isset($_POST['submit']))
{
    if(strlen($_POST['name']) > 3 and isset($_POST['severity']) and strlen($_POST['notes']) > 10)
    {
        $result = addIllness($_POST['name'], $_POST['severity'], $_POST['notes'], $_SESSION['staffAccount']['Username'], $_SESSION['staffAccount']['FirstName'], $_SESSION['staffAccount']['LastName']);

        if($result = 1)
        {
            header("Location: staffPortal.php?illnessAdded=true");
        }
        
        else if ($result = 99)
        {

        }
        else{
            header("Location: staffPortal.php?illnessAdded=false");
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


.formContainer{
    background: #2d3e3f;
	width: 450px;
	height: 650px;
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

.prescriptionValues
{
    color: white;
}

.inputBox
{
    border-radius: 5px;
}

</style>

<body>
    <div class="main">

        <div class="row">
           
        <div class="formContainer" style="margin-top:60px;">
        <h2 style="text-align:center; color:white; margin-bottom:50px;">Add Illness</h2>
        <form method="post" autocomplete="on" >
                <div class="formBox">

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="name" class="fontLabel"> Name: </label>
                            </div>
                            <div class="col-sm-6">
                            <input type="text" name="name" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="severity" class="fontLabel"> Severity: </label>
                            </div>
                            <div class="col-sm-6">
                                <select name="severity" class="form-select">
                                <option value="NA">NA</option>
                                <option value="Low">Low</option>
                                <option value="Medium">Medium</option>
                                <option value="High">High</option>
                                <option value="Terminal">Terminal</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow" style="margin-bottom:60%">
                        <div class="row">
                            <div class="col-sm-12">
                                <label for="notes" class="fontLabel"> Notes: </label>
                            </div>
                            <div class="col-sm-6">
                                <textarea name="notes" class="inputBox" maxlength="450" style="width:375px; height:400%;"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow" style="margin-top:50px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <button class="btn btn-success" name="submit" type="submit">Submit</button>
                            </div>
                            <div class="col-sm-6">
                                <a class="btn btn-warning" href="staffPortal.php">Go Home</a>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>

        </div>
        

    </div>
</body>