<?php
/**
 * Created by PhpStorm.
 * User: Cathy ICD
 * Date: 22/02/2018
 * Time: 06:28
 */

namespace app;

class score
{

    /**
     * get score of players order by highest to lowest
     */
    public function getDetails()
    {
        $mysqli = db::getConnection();
        $query = "SELECT outcome.outcome_id as outcomeID, bets.user_id as userID, outcome.outcome_status as status, outcome.score as score, users.user_name as username FROM ((outcome INNER JOIN bets ON outcome.bet_id=bets.bet_id) INNER JOIN users ON bets.user_id=users.user_id) ORDER BY score DESC LIMIT 10";

        $result = mysqli_query($mysqli, $query);

        $return_array = array();
        while ($row = mysqli_fetch_array($result)) {

            $row_array['outcomeID'] = $row['outcomeID'];
            $row_array['userID'] = $row['userID'];
            $row_array['status'] = $row['status'];
            $row_array['score'] = $row['score'];
            $row_array['username'] = $row['username'];

            array_push($return_array, $row_array);
        }
        $json_data = json_encode($return_array);
        print $json_data;

    }

}