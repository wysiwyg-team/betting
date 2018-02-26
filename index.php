<?php
/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 8:13 AM
 */

session_start();
include 'vendor/autoload.php';

use app\favGames;
use app\User;

$user = new User();
$favGames = new favGames();

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
    <title>$title</title>
    <!-- Bootstrap core CSS -->
    <link href="assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/bootstrap/css/style.css" rel="stylesheet">
</head>

<body>

<!-- Navigation -->
<?php
$active = "Home";
include 'layout/menu.php';
?>

<!-- Page Content -->
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-center">
            <h1 class="mt-5 mb-5">Betting System </h1>
        </div>
    </div>

    <?php
    $id = $user->getUserID();
    ?>

    <div class="row">
        <div class="col-6">
            <div class="bg-light">
                <h2 class="text-center">Favorite Games</h2>
                <table class="table table-bordered" id="favGames">
                    <thead>
                    <tr>
                        <th>
                            Game Name
                        </th>
                        <th>
                            Game Price
                        </th>
                        <th>
                            Game Benefit
                        </th>
                        <th>
                            Game Popularity
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="game in games">
                        <td>
                            {{game.gameName}}
                        </td>
                        <td>
                            {{game.price}}
                        </td>
                        <td>
                            {{game.benefit}}
                        </td>
                        <td>
                            {{game.popularity}}
                        </td>
                    </tr>
                    </tbody>
                </table>

            </div>
        </div>

        <div class="col-6">
            <div class="bg-light">
                <h2 class="text-center">Live Top Scorers</h2>
                <table class="table table-bordered" id="app">
                    <thead>
                    <tr>
                        <th>
                            outcomeid
                        </th>
                        <th>userid</th>
                        <th>status</th>
                        <th>score</th>
                        <th>username</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="result in results">
                        <td>
                            {{result.outcomeID}}
                        </td>

                        <td>
                            {{result.userID}}
                        </td>
                        <td>
                            {{result.status}}
                        </td>
                        <td>
                            {{result.score}}
                        </td>
                        <td>
                            {{result.username}}
                        </td>

                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript -->
<script src="assets/jquery/jquery.min.js"></script>
<script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.5.13/dist/vue.js"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="https://cdn.jsdelivr.net/lodash/4.13.1/lodash.js"></script>

<script>

    const jsonScore = "score.php";
    const jsonGames = "favouriteGames.php";

    const vueScore = new Vue({
        el: '#app',
        data: {
            // results: [{"outcomeID":"1","userID":"2","status":"win","score":"50","username":"ankush"}]
            results: []
        },
        methods: {
            getResults: function () {
                axios.get(jsonScore).then(response => {
                    this.results = response.data
                });
            }
        },
        mounted() {
            this.getResults();
            setInterval(function () {
                axios.get(jsonScore).then(response => {
                    this.results = response.data;
                });
            }.bind(this), 5000);
        }
    });

    const vueGames = new Vue({
        el: '#favGames',
        data: {
            games: []
        },
        methods: {
            getGames: function () {
                axios.get(jsonGames).then(response => {
                    this.games = response.data
                });
            }
        },
        mounted() {
            this.getGames();
            setInterval(function () {
                axios.get(jsonGames).then(response => {
                    this.games = response.data;
                });
            }.bind(this), 5000);
        }
    });
</script>

</body>
</html>

