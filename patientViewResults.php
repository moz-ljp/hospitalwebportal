<?php
require("navbar.php");
require("patientPortalFooter.php");
include_once("phpFunctions/get_patient_diagnosis.php");

if(isset($_SESSION['patientAccount']))
{
    $loggedIn = 1;
}

if($loggedIn)
{
    $diagnosisArray = getDiagnosis($_SESSION['patientAccount']['Username']);
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

</style>

<body>
    <div class="main">

        <div class="row">
           
            <div class="col-sm-8">
                <h2 class="functionsHeader">Your Results</h2>
                <table class="styled-table" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Details</th>
                            <th>Prescription</th>
                            <th>Illness</th>
                            <th>Severity</th>
                            <th>Notes</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(($diagnosisArray) != 0) { for($i=0; $i<count($diagnosisArray); $i++ ){if(count($diagnosisArray) > 0){ ?>
                        <tr>
                            <?php
                            {
                            $time = substr($diagnosisArray[$i][0], 7);
                            $time = substr($time, 4, 5); 
                            $date = substr($diagnosisArray[$i][0], 2, 9);
                            $date = date("d/m/Y", strtotime($date));
                            ?>
                            <td><?php echo $date?></td>
                            <td><?php echo $diagnosisArray[$i][1]?></td>
                            <td><?php if($diagnosisArray[$i][2] != null){ ?><a class="btn btn-success" href="viewPrescription.php?id=<?php echo $diagnosisArray[$i][2];?>">View</a><?php } else{echo "NA";}?></td>
                            <td><?php if($diagnosisArray[$i][3] != null){ ?><a class="btn btn-success" href="viewIllness.php?id=<?php echo $diagnosisArray[$i][3]."&from=results";?>">View</a><?php } else{echo "NA";}?></td>
                            <td><?php if($diagnosisArray[$i][4] != null){ echo $diagnosisArray[$i][4]; } else{echo "NA";}?></td>
                            <td><?php echo $diagnosisArray[$i][5]?></td>
                        </tr>
                        <?php }}}}?>
                    </tbody>
                </table>
            </div>

            <div class="col-sm-4">

            </div>

        </div>
        

    </div>
</body>