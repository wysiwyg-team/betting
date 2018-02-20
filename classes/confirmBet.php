<?php

namespace app;

/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 12:12 PM
 */
class confirmBet
{
    public function betConfirmed()
    {
        $mysqli = db::getConnection();

        $value = intval($_GET['amount']);
        $value2 = intval($_GET['gameId']);

        //sql injection
        //paramatised queries
        //pdo to check how to make queries.
        $query = "SELECT game_name FROM game WHERE game_id = $value2";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_row($result)) {
            $this->num_rows = mysqli_num_rows($result);
            echo '<br>';
            echo $row[0];
        }
        echo $value;
        echo $value2;
    }

//    public function saveBet(){
//        $mysqli = db::getConnection();
//
//        $value2 = intval($_GET['gameId']);
//
//        $query2 = "INSERT INTO bets (user_id,game_id) VALUES (2,$value2)";
//        if (mysqli_query($mysqli, $query2)) {
//            return true;
//        } else {
//            echo 'error';
//        }
//
//    }


//    public function getBetId(){
//        $mysqli = db::getConnection();
//        $gameId = intval($_GET['gameId']);
//
//        $query2 = "SELECT bet_id FROM bets WHERE user_id=2 AND game_id=$gameId";
//
//
//        $result = mysqli_query($mysqli, $query2);
//        while ($row = mysqli_fetch_row($result)) {
//            echo '<br>';
//             $var = $row[0];
//
//        }
//
//
//    }

//    public function BetId(){
//        $mysqli = db::getConnection();
//
//        $query2 = "SELECT amount FROM balance WHERE user_id=2 AND bet_id=24";
//
//
//        $result = mysqli_query($mysqli, $query2);
//        while ($row = mysqli_fetch_array($result)) {
//            echo '<br>';
//            echo $row[0];
//        }
//
//
//    }
}

?>