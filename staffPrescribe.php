<?php
require("navbar.php");
require("staffPortalFooter.php");
include_once("phpFunctions/get_staff_diagnosis.php");

if(isset($_SESSION['staffAccount']))
{
    $loggedIn = 1;
}

if($loggedIn)
{
    $diagnosisArray = getStaffDiagnosis($_SESSION['staffAccount']['Username']);
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

.boxContainer
{
    border: white 2px solid;
    border-radius: 5px;
}

</style>

<body>
    <div class="main">

        <div class="row">
           
            <div class="col-sm-6">
                <div class="boxContainer" style="margin-top:50px; margin-left:50px; height:200%">
                <h2 class="functionsHeader">Diagnosed Patients</h2>
                <table class="styled-table" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Illness</th>
                            <th>Severity</th>
                            <th>Notes</th>
                            <th>Prescribe</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if($diagnosisArray != 0) {for($i=0; $i<count($diagnosisArray); $i++ ){if(count($diagnosisArray) > 0){ ?>
                        <tr>
                            <?php
                            {
                            ?>
                            <td><?php echo $diagnosisArray[$i][0]." ".$diagnosisArray[$i][1]; ?></td>
                            <td><?php echo $diagnosisArray[$i][2];?></td>
                            <td><?php echo $diagnosisArray[$i][3];?></td>
                            <td><?php echo $diagnosisArray[$i][4];?></td>
                            <td><?php echo $diagnosisArray[$i][5];?></td>
                            <td><a class="btn btn-success" href="createPrescription.php?username=<?php echo $diagnosisArray[$i][2]."&illness=".$diagnosisArray[$i][3]."&id=".$diagnosisArray[$i][6];?>">Prescribe</a></td>
                        </tr>
                        <?php }}}}?>
                    </tbody>
                </table>
                </div>
            </div>

            <div class="col-sm-4">
            <div class="boxContainer" style="margin-top:50px; margin-left:100px; height:200%; ">
                <h2 class="functionsHeader" style="margin-bottom:25px">Your Functions</h2>
                
            </div>
            </div>

        </div>
        

    </div>
</body>