<?php
/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 8:13 AM
 */
include 'config.php';
use app\Balance;
use app\confirmBet;
use app\Games;

include 'vendor/autoload.php';


$games = new Games();
$balance = new Balance();
$bet = new confirmBet();

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

<body >

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

<!--modal -->
<!-- Modal -->



<!--<iframe id="myIframe" src="http://webdesign.about.com/#lp-main" height="200px" width="500px">-->
<!--    <p>This is my iframe-->
<!--</iframe>-->
<!--<p>-->
<!--    When you click <a href="http://webdesign.about.com/od/iframes/a/aaiframe.htm#abt" target="myIframe">this link</a> it will open a new document inside the above window.-->
<!--</p>-->





<div id="app">
    {{ message }}
</div>


<!-- Page Content -->
<div class="container" id="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5">Betting Games Available</h1>
</span>
        </div>
    </div>

    <div class="row">
        <?php
         $games->fetchGames();
         $balance->getAmount();

        ?>
    </div>
</div>
<?php


?>



<!-- Bootstrap core JavaScript -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/vuejs/vue.js"></script>
<script>
    var app = new Vue({
        el: '#app',
        data: {
            message: 'Hello Vue!'
        }
    });


//    function compare() {
//    var amount = document.getElementById("amount").value;
//
//        $(".gamePrice").each(function(index) {
//            if (amount === $(this).text()) {
//                alert('found')
//            } else {
//                alert('founded')
//            }
//        });
//
//    }
//
    $(document).ready(function() {
        $("#spinner").hide();

        $(".play").click(function(){
            $(".hideModal").hide(800);

            $("#modalTest").show(1000);

        });
    });


    function test() {
//

////    var value2 = document.getElementById("amount").value;
//////        alert("submit");
////        if(myVar == 50){
////            alert("value incorrect");
////
////        }
////        else{
////            alert('value correct');
////        }
////    return false;
    }


</script>

</body>

</html>

