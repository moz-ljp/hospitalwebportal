<?php
require("navbar.php");
require("staffPortalFooter.php");
include_once("phpFunctions/make_prescription.php");
include_once("phpFunctions/get_all_illness.php");

if(isset($_SESSION['staffAccount']))
{
    $loggedIn = 1;

    $illnesses = getAllIllness();

}
else
{
    header("Location: staffLogin.php?needLogin=1");
}

if(isset($_POST['submit']))
{
    
    if(isset($_POST['medicationName']) and isset($_POST['PrescriptionLength']) and isset($_POST['StartDate']))
    {
        $result = makePrescription($_GET['username'], $_POST['medicationName'], $_GET['illness'], $_POST['PrescriptionLength'], $_POST['StartDate'], $_POST['usageNotes']);

        if($result == 1)
        {
            header("Location: staffPortal.php?prescribed");
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
	width: 30%;
	height: 660px;
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
    width:180px;
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

        <div class="row" >
            <div class="formContainer" style="margin-top:60px;">
                <h2 style="text-align:center; color:white; margin-bottom:50px;">Prescribe Patient: <?php echo $_GET['username']?></h2>
                <form method="post" autocomplete="on" >
                <div class="col-sm-6">
                <div class="formBox">

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="medicationName" class="fontLabel">Medication:</label>
                            <input type="text" name="medicationName" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="PrescriptionLength" class="fontLabel">Length(Days):</label>
                            <input type="number" name="PrescriptionLength" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <label for="StartDate" class="fontLabel">StartDate:</label>
                            <input type="date" name="StartDate" class="form-control">
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-sm-12">
                            <label for="usageNotes" class="fontLabel">Usage Notes:</label>
                            <textarea class="form-control" style="width:103%; height:250px;" name="usageNotes" ></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <button name="submit" type="submit" class="btn btn-success">Submit</button>
                        </div>
                        <div class="col-sm-6">
                            <button name="reset" type="reset" class="btn btn-danger">Reset</button>
                        </div>
                    </div>

                </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>