<?php
require("navbar.php");
require("patientPortalFooter.php");
include_once("phpFunctions/get_prescription_by_id.php");

if(isset($_SESSION['patientAccount']))
{
    $loggedIn = 1;
}

if($loggedIn)
{
    $prescription = getPrescription($_GET["id"]);

    $date = substr($prescription["StartDate"], 2, 9);
     $date = date("d/m/Y", strtotime($date));

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
        <h2 style="text-align:center; color:white; margin-bottom:50px;">Your Prescription</h2>
                <div class="formBox">

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="username" class="fontLabel"> Illness: </label>
                            </div>
                            <div class="col-sm-6">
                            <p class="prescriptionValues"><?php echo $prescription["Illness"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="password" class="fontLabel"> Medication: </label>
                            </div>
                            <div class="col-sm-6">
                            <p class="prescriptionValues"><?php echo $prescription["MedicationName"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="password" class="fontLabel"> Prescription Length: </label>
                            </div>
                            <div class="col-sm-6">
                            <p class="prescriptionValues"><?php echo $prescription["PrescriptionLength"]." days"; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="password" class="fontLabel"> Start Date: </label>
                            </div>
                            <div class="col-sm-6">
                            <p class="prescriptionValues"><?php echo $date; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="password" class="fontLabel"> Usage Notes: </label>
                            </div>
                            <div class="col-sm-6">
                                <p class="prescriptionValues"><?php echo $prescription["UsageNotes"]; ?></p>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow" style="margin-top:175px;">
                        <div class="row">
                            <div class="col-sm-6">
                                <a class="btn btn-danger" href="patientViewResults.php">Go Back</a>
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