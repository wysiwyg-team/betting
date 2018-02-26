<?php

namespace app;

/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 12:13 PM
 */

include 'vendor/autoload.php';

class Outcome
{
    /**
     * @return bool
     * Add counter to the popularity of a game each time it is played
     */
    public function getCounter()
    {
        $mysqli = db::getConnection();
        $gameId = intval($_GET['gameId']);

        $query = "UPDATE game SET popularity=popularity+5 WHERE game_id=$gameId";
        if (mysqli_query($mysqli, $query)) {


            return true;
        } else {
            echo 'error';
        }

    }

    /**
     * get the outcome of the game => either win or lose
     */
    public function outcome()
    {
        $gameOutcome = array("win", "lose");
        $this->shuffle = $gameOutcome[array_rand($gameOutcome)];

        if ($this->shuffle === "win") {

            $bet = new confirmBet(db::getConnection());
            $arg = $bet->getBetId();
            $explode = explode(',', $arg, -1);
            $lastBetId = end($explode);

            $mysqli = db::getConnection();
            $saveOutcome = "INSERT INTO outcome (outcome_status,score,bet_id) VALUES('win',10,$lastBetId)";
            mysqli_query($mysqli, $saveOutcome);


            $this->win();

        } else {
            $bet = new confirmBet(db::getConnection());
            $arg = $bet->getBetId();
            $explode = explode(',', $arg, -1);
            $lastBetId = end($explode);

            $mysqli = db::getConnection();
            $saveOutcome = "INSERT INTO outcome (outcome_status,score,bet_id) VALUES('lose',0,$lastBetId)";
            mysqli_query($mysqli, $saveOutcome);


            $this->lose();

        }
    }

    /**
     * @return mixed
     * return name of current game played
     */
    public function getGameName()
    {
        $mysqli = db::getConnection();
        $gameId = intval($_GET['gameId']);

        $query = "SELECT game_name FROM game WHERE game_id = $gameId";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_row($result)) {
            echo '<br>';


            return $row[0];
        }
    }

    /**
     * @return int
     * return amount bet played from url
     */
    public function getAmountInvested()
    {
        $betAmount = intval($_GET['amount']);


        return $betAmount;
    }

    /**
     * @return bool
     * function if game outcome is WIN
     */
    public function win()
    {
        $user = new User();
        $currentUserID = $user->getUserId();

        $bet = new confirmBet(db::getConnection());
        $arg = $bet->getBetId();
        $explode = explode(',', $arg, -1);
        $lastBetId = end($explode);


        $gamePrice = intval($_GET['gamePrice']);
        $gameBenefit = intval($_GET['gameBenefit']);

        echo '<h1 class="text-center"><span>You Win</span></h1><h4>Game Played: ' . $this->getGameName() . '</h4><h4>Bet Amount: ' . $this->getAmountInvested() . '</h4> <div class="mt-5 p-2">
                                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" onClick="document.location.href=\'games.php\'">Continue</button>
                    <button type="submit" class="btn btn-warning" onClick="document.location.href=\'index.php?q=logout\'">Withdraw</button>
                    <button type="submit" class="btn btn-danger" onClick="document.location.href=\'index.php\'">Close</button>
                    </div></div>';

        $total = $this->getAmountInvested() + (($gameBenefit / 100) * $gamePrice);
        echo '<p>Your total balance is now: ' . $total . '</p>';

        $mysqli = db::getConnection();
        $query = "UPDATE balance SET amount=$total WHERE user_id=$currentUserID AND bet_id =$lastBetId";
        if (mysqli_query($mysqli, $query)) {


            return true;
        } else {
            echo 'error';
        }

        //insert into table outcome using last id
        $explode = explode(',', $arg, -1);
        $lastBetId = end($explode);
        $saveOutcome = "INSERT INTO outcome (outcome_status,bet_id) VALUES('win',$lastBetId)";
        mysqli_query($mysqli, $saveOutcome);

    }

    /**
     * @return bool
     * function if game outcome is LOSE
     */
    public function lose()
    {
        $user = new User();
        $currentUserID = $user->getUserId();

        $bet = new confirmBet(db::getConnection());
        $arg = $bet->getBetId();
        $explode = explode(',', $arg, -1);
        $lastBetId = end($explode);

        echo '<h1 class="text-center"><span>You Lose</span></h1><h4>Game Played: ' . $this->getGameName() . '</h4><h4>Bet Amount: ' . $this->getAmountInvested() . '</h4> <div class="mt-5 p-2">
              <div class="modal-footer"><button type="submit" class="btn btn-warning">Withdraw</button><button type="submit" class="btn btn-danger" onClick="document.location.href=\'index.php\'">Close</button>
              </div></div>';

        $total = $this->getAmountInvested() - $this->getAmountInvested();
        echo '<p>Your total balance is now: ' . $total . '</p>';

        $mysqli = db::getConnection();
        $query = "UPDATE balance SET amount=$total WHERE user_id=$currentUserID AND bet_id=$lastBetId";
        if (mysqli_query($mysqli, $query)) {

            return true;
        } else {
            echo 'error';
        }

        //insert into table outcome using last id
        $explode = explode(',', $arg, -1);
        $lastBetId = end($explode);
        $saveOutcome = "INSERT INTO outcome (outcome_status,bet_id) VALUES('lose',$lastBetId)";
        mysqli_query($mysqli, $saveOutcome);

    }

}


?>