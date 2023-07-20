<?php 

session_start();

$isPatient = isset($_SESSION['patientAccount']);
$isDoctor = isset($_SESSION['staffAccount']);
$isAdmin = isset($_SESSION['adminAccount']);


if(isset($_GET["killSession"]))
{
    destroySession();
    header('Location: index.php');
}

function destroySession()
{
    session_destroy();
}

?>

<!DOCTYPE html>

<html lang="en">
    <head>
    <link href="style.css" rel="stylesheet">

        <title>
            | Hospital Management System |
        </title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    </head>

    <body>

        <header>
            <nav  class="navbar navbar-expand-lg navbar-dark bg-dark">
                <a class="navbar-brand" class="smallspace" href="index.php" style="margin-left:38%;">Hospital Management System</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle Navigation">
                <span class="navbar-toggler-icon"></span>
                </button>

                <?php if((!$isPatient and !$isDoctor and !$isAdmin)) { ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Home<span class="sr-only"></span></a>
                        <a class="nav-item nav-link" href="signup.php">Sign Up</a>
                        <a class="nav-item nav-link" href="login.php">Login</a>
                        <a class="nav-item nav-link" href="staffLogin.php">Staff Login</a>
                    </div>
                </div>
                <?php } ?>

                <?php if($isPatient) { ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Home<span class="sr-only"></span></a>
                        <a class="nav-item nav-link" href="patientPortal.php">Patient Portal<span class="sr-only"></span></a>
                        <a class="nav-item nav-link" href="?killSession">Log Out<span class="sr-only"></span></a>
                        
                    </div>
                </div>
                <?php } ?>

                <?php if($isDoctor) { ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Home<span class="sr-only"></span></a>
                        <a class="nav-item nav-link" href="staffPortal.php">Staff Portal<span class="sr-only"></span></a>
                        <a class="nav-item nav-link" href="?killSession">Log Out<span class="sr-only"></span></a>
                        
                    </div>
                </div>
                <?php } ?>

                <?php if($isAdmin) { ?>
                <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                    <div class="navbar-nav">
                        <a class="nav-item nav-link" href="index.php">Home<span class="sr-only"></span></a>
                        <a class="nav-item nav-link" href="adminPortal.php">Admin Portal<span class="sr-only"></span></a>
                        <a class="nav-item nav-link" href="?killSession">Log Out<span class="sr-only"></span></a>
                        
                    </div>
                </div>
                <?php } ?>

            </nav>
        </header>

    </body>

</html>