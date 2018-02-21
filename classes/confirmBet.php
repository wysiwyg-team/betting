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


//    public $gameId;
    public $instanceDB;

    /**
     * confirmBet constructor.
     * @param $betId
     * @param $gameId
     * @param $instanceDB
     */
    public function __construct($instanceDB)
    {
        $this->instanceDB = $instanceDB;
    }


    public function saveBet()
    {
        $betAmount = intval($_GET['amount']);

        $gameId = intval($_GET['gameId']);

        $saveBet = "INSERT INTO bets (bet_amount,user_id,game_id) VALUES ($betAmount,2,$gameId)";
//        $saveBalance = "INSERT INTO balance (amount,user_id) VALUES ($betAmount,2)";
//        mysqli_query($this->instanceDB, $saveBalance);

        if (mysqli_query($this->instanceDB, $saveBet)) {
            return true;
        } else {
            echo 'error';
        }
    }

    /**
     * get the bet id of the game played where user id = user id
     */
    public function getBetId()
    {
        $gameId = intval($_GET['gameId']);

        $query2 = "SELECT bet_id FROM bets WHERE user_id=2 AND game_id=$gameId";
        $result = mysqli_query($this->instanceDB, $query2);

        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
            $temp[] = $row['bet_id'];
        }
        if (is_array($temp))
            return implode(",", $temp);
        return false;
    }

    /**
     *
     */
    public function saveBetAmount()
    {
        $betAmount = intval($_GET['amount']);
        $arg = $this->getBetId();


        $saveBalance = "INSERT INTO balance (amount,user_id,bet_id) VALUES ($betAmount,2,$arg)";
//        $query2 = "SELECT amount FROM balance WHERE user_id=2 AND bet_id in ($arg)";

        if (mysqli_query($this->instanceDB, $saveBalance)) {
            return true;
        } else {
            echo 'error';
        }
    }
}

?>