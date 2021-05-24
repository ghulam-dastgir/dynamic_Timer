<?php
session_start();
if(!isset($_SESSION['agent_id'])){
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <title>Attendence | Employe</title>
</head>

<body>
    <div class="employe-div">
        <div class="header bg-teal p-4">

        </div>
        <div class="row">
            <div class="col-md-2 bg-teal sidebar p-0">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="employee.php" class="nav-link       bg-light">Attendencec</a></li>
                    <li class="nav-item"><a href="logout.php" class="bg-teal text-light nav-link">logout</a></li>
                </ul>
            </div>
            <div class="col-md-10 rightside">
                <div class="content mx-3 my-5">
                    <div class="timer-header bg-dark p-2 px-3 text-light clearfix">
                        <h3 class="float-lef">Your Shedule</h3>
                        <div class="timer float-right">
                            <a href="" class="btn btn-success start">Start</a>
                            <a href="" class="btn btn-danger pause">Stop</a>
                            <div id="time_result" class="pl-4 mt-1"></div>
                        </div>
                    </div>
                    <div class="table responsive">
                        <table class="table">
                            <div class="countdown"></div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
    let isPaued = false;
    let i =0;
    let timeInterval = window.setInterval(() => {
        if (!isPaued) {
            $("#time_result").load("timer.php");
        }
    }, 1000);
    $(".pause").on('click', function (e) {
        e.preventDefault();
        isPaued = true;
    });
    $(".start").on('click', function (e) {
        e.preventDefault();
        isPaued = false;
    });
    $("body").on({
        mouseleave: function () {
            isPaued = true;
        },
        mousemove: function () {
            isPaued = false;
        },
    });
    $("body").keypress(function (e) {
        isPaued = false;
    });
    let stopInterval = setInterval(() => {
        isPaued = true;
    }, 300000);
    // By Deffault Time Stop
    setTimeout(() => {
        isPaued = true;
    }, 1000);
</script>
</html>