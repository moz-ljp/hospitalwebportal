<?php
require("navbar.php");
require("patientPortalFooter.php");
include_once("phpFunctions/get_appointments_by_day.php");

if(isset($_SESSION['staffAccount']))
{
    $loggedIn = 1;
}

if($loggedIn and isset($_POST['submit']))
{

   $selectedDate = $_POST['dateSelection'];
   $selectedDate = str_replace('/','-',$selectedDate);

   if(strtotime($selectedDate) >= strtotime(date("Y-m-d")))
   {
    $appointmentArray = getAppointmentsByDay($_POST['dateSelection']);
   }
   else
   {
    header("Location: staffPortal.php?inpast=true");
   }
}
else if($loggedIn)
{
    $selectedDate = date("Y-m-d");
    $appointmentArray = getAppointmentsByDay($selectedDate);   
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
    padding: 2px 15px;
}

.styled-table tbody tr {
    border-bottom: 1px solid #dddddd;
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: white;
}
.styled-table tbody tr:nth-of-type(odd) {
    background-color: lightblue;
}


.styled-table tbody tr:last-of-type {
    border-bottom: 2px solid #009879;
}

.styled-table tbody tr.active-row {
    font-weight: bold;
    color: white;
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
           
            <div class="col-sm-8">

            <?php if(isset($appointmentArray)) { ?>

            <div class="boxContainer" style="margin-top:50px; margin-left:50px; height:200%">
                <h2 class="functionsHeader">Available Appointments for <?php echo date("d/m/Y", strtotime(substr($appointmentArray[0][3],2,9))) ?></h2>
                <table class="styled-table" style="margin-left:auto; margin-right:auto">
                    <thead>
                        <tr>
                            <th>Time</th>
                            <th>Book</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if(isset($appointmentArray)) {for($i=0; $i<count($appointmentArray); $i++ ){if(count($appointmentArray) > 0){ ?>
                        <tr>
                            <?php
                            $time = substr($appointmentArray[$i][3], 7);
                            $time = substr($time, 4, 5); 
                            $date = substr($appointmentArray[$i][3], 2, 9);
                            $date = date("d/m/Y", strtotime($date));
                            ?>
                            <td><?php echo $time?></td>
                            <td><a class="btn btn-success" href="staffConfirmAppointment.php?date=<?php echo $appointmentArray[$i][3];?>" style="height:30px; font-size:15px;">Book</a></td>
                        </tr>
                        <?php }}}?>
                    </tbody>
                </table>
                </div>
                
            </div>

            <div class="col-sm-2" style="margin-top:10%;">
                <form method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <label for="dateSelection" class="functionsHeader">Choose Date</label>
                    <input type="date" class="form-control" name="dateSelection">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
            </div>

            <?php } else { ?>

                <div class="col-sm-2" style="margin-top:10%; margin-left: 50%;">
                <h2 style="color:white;">Please choose a date</h2>
                <form method="post" autocomplete="on" >
                    <label for="dateSelection" class="functionsHeader">Choose Date</label>
                    <input type="date" class="form-control" name="dateSelection">
                    <button type="submit" name="submit" class="btn btn-success">Submit</button>
                </form>
            </div>

                <?php } ?>

            

        </div>
        

    </div>
</body>