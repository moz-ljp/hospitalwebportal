<?php
require("navbar.php");
require("patientPortalFooter.php");
include_once("phpFunctions/get_patient_appointments.php");

if(isset($_SESSION['patientAccount']))
{
    $loggedIn = 1;
}

if($loggedIn)
{
    $appointmentArray = getAppointments($_SESSION['patientAccount']['Username']);
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

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">

        <?php if(isset($_GET['booked'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Your appointment has been booked successfully.
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif; ?>

    </div>

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">

        <?php if(isset($_GET['inpast'])): if($_GET['inpast'] == "true"){ ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            You cannot book appointments in the past.
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php }endif; ?>

    </div>

        <div class="row">
           
            <div class="col-sm-6">
                <div class="boxContainer" style="margin-top:50px; margin-left:50px; height:200%">
                <h2 class="functionsHeader">Your Appointments</h2>
                <table class="styled-table" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time</th>
                            <th>Doctor</th>
                            <th>Details</th>
                            <th>Cancel</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if($appointmentArray != 0) { for($i=0; $i<count($appointmentArray); $i++ ){if(count($appointmentArray) > 0){ ?>
                        <tr>
                            <?php if($appointmentArray[$i][6] == 0)
                            {
                            $time = substr($appointmentArray[$i][3], 7);
                            $time = substr($time, 4, 5); 
                            $date = substr($appointmentArray[$i][3], 2, 9);
                            $date = date("d/m/Y", strtotime($date));
                            ?>
                            <td><?php echo $date?></td>
                            <td><?php echo $time?></td>
                            <td><?php echo $appointmentArray[$i][2]?></td>
                            <td><?php echo $appointmentArray[$i][4]?></td>
                            <td><a class="btn btn-danger" href="patientCancelAppointment.php?id=<?php echo $appointmentArray[$i]["AppointmentID"]?>">Cancel</a></td>
                        </tr>
                        <?php }}}}?>
                    </tbody>
                </table>
                </div>
            </div>

            <div class="col-sm-4">
            <div class="boxContainer" style="margin-top:50px; margin-left:100px; height:200%; ">
                <h2 class="functionsHeader" style="margin-bottom:25px">Your Functions</h2>
                <div class="row functionsLayout">
                    <a href="patientBookAppointment.php" class="btn btn-success">Book Appointment</a>
                </div>
                <div class="row functionsLayout">
                    <a class="btn btn-success" href="patientViewPrescriptions.php">Access Prescriptions</a>
                </div>
                <div class="row functionsLayout">
                    <a class="btn btn-success" href="patientViewResults.php">View Appointment Results</a>
                </div>
            </div>
            </div>

        </div>
        

    </div>
</body>