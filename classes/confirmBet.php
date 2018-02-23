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

    public $instanceDB;

    /**
     * confirmBet constructor.
     * @param $instanceDB
     */
    public function __construct($instanceDB)
    {
        $this->instanceDB = $instanceDB;
    }

    /**
     * @return bool
     */
    public function saveBet()
    {
        $betAmount = intval($_GET['amount']);
        $gameId = intval($_GET['gameId']);

        $saveBet = "INSERT INTO bets (bet_amount,user_id,game_id) VALUES ($betAmount,2,$gameId)";

        if (mysqli_query($this->instanceDB, $saveBet)) {
            return true;
        } else {
            echo 'error';
        }
    }


    /**
     * @return bool|string
     * get the bet id where userid= userid and gameid=gameid
     */
    public function getBetId()
    {
        $gameId = intval($_GET['gameId']);

        $query = "SELECT bet_id FROM bets WHERE user_id=2 AND game_id=$gameId ORDER BY bet_id ASC";
        $result = mysqli_query($this->instanceDB, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            // print_r($row);
            $temp[] = $row['bet_id'];
        }
        if (is_array($temp))
            return implode(",", $temp);
        return false;
    }

    /**
     * @return bool
     */
    public function saveBetAmount()
    {
        $betAmount = intval($_GET['amount']);
        $arg = $this->getBetId();
        $explode = explode(',', $arg, -1);
        $lastBetId = end($explode);

        $saveBalance = "INSERT INTO balance (amount,user_id,bet_id) VALUES ($betAmount,2,$lastBetId)";
        if (mysqli_query($this->instanceDB, $saveBalance)) {
            return true;
        } else {
            echo 'error';
        }
    }
}

?>