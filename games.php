<?php
session_start();

/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 8:13 AM
 */

use app\Balance;
use app\confirmBet;
use app\db;
use app\Games;

include 'vendor/autoload.php';


use app\User;

$games = new Games();
$balance = new Balance();
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Betting Games</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="assets/bootstrap/css/style.css" rel="stylesheet">
</head>

<body>
<!-- Navigation -->
<?php
$active = "Game";
include 'layout/menu.php';
?>

<!-- Page Content -->
<div class="container" id="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Betting Games Available</h1>
        </div>
    </div>

    <div class="row">
        <?php
        $games->fetchGames();
        $balance->getAmount();
        $user = new User();
        $currentUserID = $user->getUserId();
        ?>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vuejs/vue.js"></script>
<script>

    $(document).ready(function () {
//        $('#play').click.each(function(){
//            var plays = $('#play').attr('data-play');
//            alert(plays);
//
//        });

        $('.play').each(function () {
            var $this = $(this);
            $this.on("click", function () {
//                alert($(this).data('play'));
                var amount = $('.amount').val();

                $('.gamePrice').each(function () {
                    var price = $('#gamePrice').attr('data-gamePrice');
                    alert(price);

                });
            });
            return false;
        });


//        $('.play').click(function (e) {
////                var gamePrice = $('#gamePrice').data('gamePrice');

////                var show = gamePrice.data("gamePrice");
////                alert(gamePrice.val("gamePrice",show));
//
////                alert(amount);
////                alert(show);
//
//
//
//                if (amount < gamePrice) {
//                    alert('amount played too less');
//                    e.preventDefault();
//                }
//
//                //chk bal
//                if (checkbalance(amount, <?php //echo $currentUserID ?>//)) {
//                    return true;
//                }
//                alert('balance too less');
//                return false;
//            }
//        );

        function checkbalance(amount, user_id) {

            $.ajax(
                {
                    type: "POST",
                    url: 'check.php',
                    data: (amount + user_id),
                    // async: false,
                    success: function (response) {
                        if (response.data.status !== 0) {
                            return true;
                        }
                        return false;

                    },
                    dataType: 'json'
                }
            )


        }
    })
</script>

</body>
</html>

