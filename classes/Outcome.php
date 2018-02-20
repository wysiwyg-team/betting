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

    public function outcome()
    {
        $gameOutcome = array("win", "lose");
        $this->shuffle = $gameOutcome[array_rand($gameOutcome)];

        if ($this->shuffle === "win") {
            $this->win();


        } else {
            $this->lose();
        }
    }

    public function getGameName()
    {
        $mysqli = db::getConnection();

        $value2 = intval($_GET['gameId']);

        $query = "SELECT game_name FROM game WHERE game_id = $value2";
        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_row($result)) {
            $this->num_rows = mysqli_num_rows($result);
            echo '<br>';
            return $row[0];
        }
    }

    public function getAmountInvested()
    {
        $betAmount = intval($_GET['amount']);
        return $betAmount;
    }

    public function win()
    {


        $gamePrice = intval($_GET['gamePrice']);
        $gameBenefit = intval($_GET['gameBenefit']);


        echo '<h1 class="text-center"><span>You Win</span></h1>
                    <h4>Game Played: ' . $this->getGameName() . '</h4>
                    <h4>Bet Amount: ' . $this->getAmountInvested() . '</h4> <div class="mt-5 p-2">
                                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Continue</button>
                    <button type="submit" class="btn btn-warning">Withdraw</button>
                    <button type="submit" class="btn btn-danger" onClick="document.location.href=\'index.php\'">Close</button>
                    </div></div>';

        $total = $this->getAmountInvested() + (($gameBenefit / 100) * $gamePrice);

        echo '<p>Your total balance is now: ' . $total . '</p>';

        $mysqli = db::getConnection();
        $query = "UPDATE balance SET amount=$total WHERE user_id=2";
        if (mysqli_query($mysqli, $query)) {
            return true;
        } else {
            echo 'error';
        }

    }

    public function lose()
    {
        echo '<h1 class="text-center"><span>You Lose</span></h1>
                    <h4>Game Played: ' . $this->getGameName() . '</h4>
                    <h4>Bet Amount: ' . $this->getAmountInvested() . '</h4> <div class="mt-5 p-2">
                                                    <div class="modal-footer">
                    <button type="submit" class="btn btn-warning">Withdraw</button>
                    <button type="submit" class="btn btn-danger" onClick="document.location.href=\'index.php\'">Close</button>
                    </div></div>';

        $total = $this->getAmountInvested() - $this->getAmountInvested();
        echo '<p>Your total balance is now: ' . $total . '</p>';

        $mysqli = db::getConnection();
        $query = "UPDATE balance SET amount=$total WHERE user_id=2";
        if (mysqli_query($mysqli, $query)) {
            return true;
        } else {
            echo 'error';
        }
    }


}


?>