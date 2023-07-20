<?php
require("navbar.php");
require("staffPortalFooter.php");
include_once("phpFunctions/make_Diagnosis.php");
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
    
    if(isset($_POST['illnessName']) and isset($_POST['diagnosisNotes']))
    {
        $severity;
        for($i = 0; $i<count($illnesses); $i++)
        {
            if($illnesses[$i]["Name"] == $_POST['illnessName'])
            {
                $severity = $illnesses[$i]["Severity"];
            }
            else if($_POST['illnessName'] == "NA")
            {
                $severity = "NA";
            }
        }
        $result = makeDiagnosis($_GET['appointmentID'], $_GET['patientUsername'], $_SESSION['staffAccount']['Username'], $_POST['illnessName'], $severity, $_POST['diagnosisNotes']);

        if($result == 1)
        {
            header("Location: staffPortal.php?diagnosed");
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
	height: 600px;
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
                <h2 style="text-align:center; color:white; margin-bottom:50px;">Diagnose Patient: <?php echo $_GET['patientUsername']?></h2>
                <form method="post" autocomplete="on" >
                <div class="col-sm-6">
                <div class="formBox">

                    <div class="row">
                        <div class="col-sm-6">
                            <label for="illnessName" class="fontLabel">Illness:</label>
                            <select name="illnessName" class="form-control">
                                <option value="NA">NA</option>
                                <?php for($i = 0; $i<count($illnesses); $i++){ ?>
                                    <option value="<?php echo $illnesses[$i]["Name"]?>"><?php echo $illnesses[$i]["Name"]?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="row" style="margin-bottom:20px">
                        <div class="col-sm-12">
                            <label for="diagnosisNotes" class="fontLabel">Diagnosis Notes:</label>
                            <textarea class="form-control" style="width:103%; height:250px;" name="diagnosisNotes" ></textarea>
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