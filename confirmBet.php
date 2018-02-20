<?php
/**
 * Created by PhpStorm.
 * User: Cathy ICD
 * Date: 17/02/2018
 * Time: 07:35
 */

use app\Balance;
use app\confirmBet;
use app\Outcome;

include 'vendor/autoload.php';

$balance = new Balance();
$bet = new confirmBet();
$outcome = new Outcome();


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Custom styles for this template -->
    <style>
        body {
            padding-top: 54px;
        }

        @media (min-width: 992px) {
            body {
                padding-top: 56px;
            }
        }

    </style>
</head>
<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="index.php">Betting</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item ">
                    <a class="nav-link" href="index.php">Home
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="games.php">Games</a>
                    <span class="sr-only">(current)</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <p>your bet has been confirmed.. click play to continue</p>
            <span id="spinner"><i class="fa fa-spinner fa-spin" style="font-size:24px"></i></span>


            <button type="submit" data-toggle="modal" data-target="#modalOutcome" id="next" class="next">Play</button>

            <?php
//            $bet->saveBet();
            $balance->getAmount();
//            $bet->getBetId();
//            $bet->BetId();


            ?>

        </div>
    </div>
</div>


<div class="modal fade" id="modalOutcome" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Game Outcome</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php
                $outcome->outcome();
                ?>
            </div>

        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vuejs/vue.js"></script>

<script>
    $(document).ready(function () {
        $("#spinner").hide();

        $(".next").click(function () {
            $(".container").hide(800);

            $("#spinner").show(1000);
            //setTimeout(function () {
            //    window.location.href = "confirmBet.php?gameId=<?php //echo $_GET['gameId'];?>//&gamePrice=<?php //echo $_GET['gamePrice'];?>//&gameBenefit=<?php //echo $_GET['gameBenefit'];?>//&amount=<?php //echo $_GET['amount'];?>//";
            //}, 5000);
        });
    });
</script>
</body>
</html>
