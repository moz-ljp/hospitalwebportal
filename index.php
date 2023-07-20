<?php
require("navbar.php");

?>

<style>
 .sectionContainer {
    position: relative;
    text-align: center;
    color: white;
  }
  
/* Bottom left text */
.bottom-left {
  position: absolute;
  bottom: 8px;
  left: 16px;
}

/* Top left text */
.top-left {
    position: absolute;
  top: 8px;
  left: 16px;
}

/* Top right text */
.top-right {
  position: absolute;
  top: 8px;
  right: 16px;
}

/* Bottom right text */
.bottom-right {
    position: absolute;
bottom: 8px;
right: 16px;
}

/* Centered text */
.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}

.center-bottom
{
    position: absolute;
    top: 80%;
    left:50%;
    transform: translate(-50%, -50%);
}

.left-bottom {
  position: absolute;
  top: 70%;
  left: 20.5%;
  transform: translate(-50%, -50%);
}

.sectionContainer h2{
    margin: 20px;
}

h2 span{
    color: white;
    font: bold;
    letter-spacing: -1px;
    background: #3d3d3d;
    padding: 10px;      
}

h3 span{
    color: white;
    font: bold;
    letter-spacing: -1px;
    background: #3d3d3d;
    padding: 10px;      
}

.top-left span{
    color: white;
    font: bold;
    letter-spacing: -1px;
    background: #3d3d3d;
    padding: 10px;  
    font-size: 30px;
}

</style>

<div class="sectionContainer">

            <img src="images/indexback.png" style="width:100%; height:80%;" >

            <div class="top-left"><h2><span>Hospital Management System<span></h2></div>

            <div class="left-bottom"><h3><span>A functional, efficient, secure HMS for you and your hospital.</span></h3></div>

            <div class="center-bottom"><a href="#s2" class="btn btn-success">Explore</a></div>

</div>

<div class="sectionContainer" id="s2">

            <img src="images/indextwo.jpg" style="width:100%; height:80%;">

            <div class="row">
                <div class="col-sm-6">
                    <div class="top-left" style="margin-top:20px";>
                        <img src="images/doctors.png" style="width:50%;">
                    </div>
                </div>
                <div class="col-sm-6">
                        <div class="row top-left" style="margin-left:50%; margin-top:100px;">
                            <div class="" style="margin-right:60%; margin-top:25px"><span>Allow your doctors to perform at their optimal capacity.</span></div>
                        </div>
                        <div class="row top-left" style="margin-left:50%; margin-top:200px;">
                            <div class="" style="margin-right:60%; margin-top:25px"><span>Give your patient's the freedom to build their own schedule.</span></div>
                        </div>
                        <div class="row top-left" style="margin-left:50%; margin-top:300px;">
                            <div class="" style="margin-right:60%; margin-top:25px"><span>Manage your system internally to save money.</span></div>
                        </div>
                        <div class="row top-left" style="margin-left:50%; margin-top:400px;">
                            <div class="" style="margin-right:60%; margin-top:25px"><span>Ensure your hospital runs efficiently and with fluidity.</span></div>
                        </div>
                </div>
            </div>

            

</div>