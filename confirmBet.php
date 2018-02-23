<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Cathy ICD
 * Date: 17/02/2018
 * Time: 07:35
 */

use app\Balance;
use app\confirmBet;
use app\db;
use app\Games;
use app\Outcome;
use app\User;

include 'vendor/autoload.php';

$games = new Games();
$balance = new Balance();
$bet = new confirmBet(db::getConnection());
$outcome = new Outcome();
$user = new User();

$user_id = $_SESSION['user_id'];
if (!$user->get_session()) {
    header("location:login.php");
}

if (isset($_GET['q'])) {
    $user->logout();
    header("location:login.php");
}
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
    <link href="assets/bootstrap/css/style.css" rel="stylesheet">
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <?php
            $outcome->getCounter();
            $bet->saveBet();

            $bet->saveBetAmount();
            $bet->getBetId();

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

        $('#modalOutcome').modal({
            keyboard: false,
            backdrop: 'static'
        });

        $(".next").click(function () {
            $(".container").hide(800);

            $("#spinner").show(1000);
        });
    });
</script>

</body>
</html>
