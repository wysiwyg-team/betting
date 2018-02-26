<?php
/**
 * Created by PhpStorm.
 * User: Cathy ICD
 * Date: 23/02/2018
 * Time: 07:32
 */

namespace app;

class favGames
{
    /**
     * Get the list of games mostly played by all users
     */
    public function getFavGames()
    {
        $mysqli = db::getConnection();
        $query = "SELECT game_name as gameName, price as price, game_benefit as benefit, popularity as popularity FROM game ORDER BY popularity DESC";
        $result = mysqli_query($mysqli, $query);

        $return_array = array();
        while ($row = mysqli_fetch_array($result)) {
            $row_array['gameName'] = $row['gameName'];
            $row_array['price'] = $row['price'];
            $row_array['benefit'] = $row['benefit'];
            $row_array['popularity'] = $row['popularity'];
            array_push($return_array, $row_array);
        }
        $json_data = json_encode($return_array);

        print $json_data;

    }
}