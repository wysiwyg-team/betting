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
     * Insert into table Bets the bet_amount AND user_id AND game_id
     */
    public function saveBet()
    {
        $user = new User();
        $currentUserID = $user->getUserId();

        $betAmount = intval($_GET['amount']);
        $gameId = intval($_GET['gameId']);

        $saveBet = "INSERT INTO bets (bet_amount,user_id,game_id) VALUES ($betAmount,$currentUserID,$gameId)";
        if (mysqli_query($this->instanceDB, $saveBet)) {


            return true;
        } else {
            echo 'error';
        }
    }


    /**
     * @return bool|string
     * Get the bet_id FROM table bets where user_id = current user_id and game_id = game_id played
     */
    public function getBetId()
    {
        $user = new User();
        $currentUserID = $user->getUserId();
        $gameId = intval($_GET['gameId']);

        $query = "SELECT bet_id FROM bets WHERE user_id=$currentUserID AND game_id=$gameId ORDER BY bet_id ASC";
        $result = mysqli_query($this->instanceDB, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $temp[] = $row['bet_id'];
        }
        if (is_array($temp))

            return implode(",", $temp);

        return false;
    }

    /**
     * @return bool
     * Insert into table Balance the bet_amount played AND current user_id AND current bet_id
     */
    public function saveBetAmount()
    {
        $user = new User();
        $currentUserID = $user->getUserId();

        $betAmount = intval($_GET['amount']);
        $arg = $this->getBetId();
        $explode = explode(',', $arg, -1);
        $lastBetId = end($explode);

        $saveBalance = "INSERT INTO balance (amount,user_id,bet_id) VALUES ($betAmount,$currentUserID,$lastBetId)";
        if (mysqli_query($this->instanceDB, $saveBalance)) {


            return true;
        } else {
            echo 'error';
        }
    }
}

?>