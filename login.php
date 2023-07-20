<?php
require("navbar.php");
include_once("phpFunctions/patient_login.php");

if(isset($_GET['username']))
{
    $username = $_GET['username'];
}

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];


    $result = patientLogin($username, $password);

    if($result != 0 and $result != "DB Error")
    {
        $_SESSION['patientAccount'] = $result;

        header("Location: patientPortal.php");
    }
    else if($result == "DB Error")
    {
        header("Location: login.php?dberror");
    }
    else
    {
        header("Location: login.php?login=failed");
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

        <?php if(isset($username)): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            Your account has been created and your username has been automatically filled.
            <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
        <?php endif; ?>

    </div>

    <div class="row" style="margin-top:20px; width:40%; margin-left:30%">

<?php if(isset($_GET['login'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    Sorry, either your username or password was incorrect.
    <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php endif; ?>

<div class="row" style="margin-top:20px; width:40%; margin-left:30%">

<?php if(isset($_GET['dberror'])): ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
    Sorry, the database is currently unresponsive.
    <button type="button" class="close btn" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
    </div>
<?php endif; ?>

</div>

    <div class="row" >
        <div class="formContainer" style="margin-top:60px;">
        <h2 style="text-align:center; color:white; margin-bottom:50px;">Login</h2>
            <form method="post" autocomplete="on" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                <div class="formBox">

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="username" class="fontLabel"> Username: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="text" class="minEntryWidth" placeholder="Joggs12" name="username" value=<?php if(isset($username)){echo $username;} ?>>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow">
                        <div class="row">
                            <div class="col-sm-5">
                                <label for="password" class="fontLabel"> Password: </label>
                            </div>
                            <div class="col-sm-6">
                                <input type="password" class="minEntryWidth" placeholder="" name="password">
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 entryRow" style="margin-top:175px;">
                        <div class="row">
                            <div class="col-sm-12">
                                <center><button class="btn btn-success" type="submit" name="submit">Submit</button></center>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </div>
    

</div>
        </body>