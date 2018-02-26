<?php
/**
 * Created by PhpStorm.
 * User: Cathy ICD
 * Date: 23/02/2018
 * Time: 14:34
 */

namespace app;
include 'vendor/autoload.php';
$user = new User();
$currentUserID = $user->getUserId();


class check
{
    /**
     * Check balance available of current user
     */
    public function checkBalance()
    {
        $mysqli = db::getConnection();
        $amt = $_POST['amount'];
        $user_id = $_POST['user_id'];
        $query = "SELECT amount FROM balance WHERE user_id=$currentUserID ORDER BY balance_id DESC LIMIT 1";

        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<br>';
            $balance = $row['amount'];
        }

        if ($amt > $balance) {

            $outcome = 0;
        } else {

            $outcome = 1;
        }

        $results = [
            'status' => $outcome
        ];
        echo json_encode($results);
    }

}

$chk = new check();
$chk->checkBalance();