<?php
/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 8:13 AM
 */

session_start();
include 'vendor/autoload.php';
use app\User;

$user = new User();


$user_id = $_SESSION['user_id'];
if (!$user->get_session()){
 header("location:login.php");
}

if (isset($_GET['q'])){
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

    <title>Betting HomePage</title>

    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">

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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="index.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="games.php">Games</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?q=logout">LOGOUT</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5 mb-5">Betting System </h1>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="bg-light">
                <h2 class="text-center">Favourite Games</h2>
                <div class="row">
                    <div class="col-6">a</div>
                    <div class="col-6">a</div>
                </div>
                <div class="row">
                    <div class="col-6">a</div>
                    <div class="col-6">a</div>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="bg-light">
                <h2 class="text-center">Top Scorer</h2>
                <table class="table table-bordered">

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>

