<?php

namespace app;
include 'vendor/autoload.php';

/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 9:34 AM
 */
class Games
{

    public $gameID;

    /**
     * Function to show available games to play and display their respective modals
     */

    public function fetchGames()
    {
        $mysqli = db::getConnection();
        $query = "SELECT * FROM game";

        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            $this->num_rows = mysqli_num_rows($result);
            $this->gameID = $row['game_id'];
            $gameName = $row['game_name'];
            $gamePrice = $row['price'];
            $gameBenefit = $row['game_benefit'];

            echo "<div class='col-3 ml-5 mt-4'>";
            echo "<div class='card' style='width:20rem;'><img class='card-img-top' src='http://i.dailymail.co.uk/i/pix/2017/10/22/11/45677F8A00000578-5005515-image-m-3_1508669219058.jpg' alt='Card image cap'><div class='card-block'><h4 class='card-title'>";
            echo ucfirst($gameName) . "</h4><p class='card-text'><div>Game Price: <span>" . $gamePrice . "</span></div><div>Game Benefits: " . $gameBenefit . "%</div></p><a href='#' class='btn btn-primary' data-toggle='modal' data-target='#modal" . $this->gameID . "'>Place bet on game " . $this->gameID . "</a>";
            echo "</div></div></div>";
            echo '<div class="modal fade hideModal" id="modal' . $this->gameID . '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                    <div class="modal-content"><div class="modal-header">
                     <h5 class="modal-title" id="exampleModalLabel">Place bet on game' . $this->gameID . '</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button></div><div class="modal-body">
                     <form action="confirmBet.php" method="get">
                     <input type="hidden" id="gameId" name="gameId" value="' . $this->gameID . '">
                      <input type="hidden" id="gamePrice" class="gamePrice" name="gamePrice" value="' . $gamePrice . '">
                     <input type="hidden" id="gameBenefit" name="gameBenefit" value="' . $gameBenefit . '">
                     <div class="form-group"><label for="amount">Amount: </label>
                     
                      <input type="text" class="form-control amount" id="amount"  name="amount" placeholder="Minimum bet is $' . $gamePrice . '">
                    </div></div><div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="play" name="play" class="play">Play</button>
                    </form></div></div></div></div>';

        }


    }
}


?>