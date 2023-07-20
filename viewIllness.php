<?php
require("navbar.php");
require("patientPortalFooter.php");
include_once("phpFunctions/get_illness_by_name.php");

if(isset($_SESSION['patientAccount']))
{
    $loggedIn = 1;
}

if($loggedIn)
{
    $illness = getIllness($_GET["id"]);
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

</style>

<body>
    <div class="main">

        <div class="row">
           
        <div class="formContainer" style="margin-top:60px;">
        <h2 style="text-align:center; color:white; margin-bottom:50px;"><?php echo $illness["Name"]?></h2>
                <div class="formBox">

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="password" class="fontLabel"> Severity: </label>
                            </div>
                            <div class="col-sm-6">
                            <p class="prescriptionValues"><?php echo $illness["Severity"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="password" class="fontLabel"> Notes: </label>
                            </div>
                            <div class="col-sm-6">
                                <p class="prescriptionValues"><?php echo $illness["Notes"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow" style="margin-top:100px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="btn btn-danger"
                                <?php if($_GET['from'] == "prescriptions") { ?>
                                href="patientViewPrescriptions.php">Go Back</a>
                                <?php } else if($_GET['from'] == "results") { ?>
                                    href="patientViewResults.php">Go Back</a>
                                <?php } ?>
                            </div>
                            <div class="col-sm-6">
                                <a class="btn btn-warning" href="patientPortal.php">Go Home</a>
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