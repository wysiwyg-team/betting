<?php

namespace app;

/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 10:49 AM
 */
include 'vendor/autoload.php';

class Balance
{
    /**
     * @return bool
     * Insert amount played in table Balance
     */
    public function getAmount()
    {
        $user = new User();
        $currentUserID = $user->getUserId();

        $mysqli = db::getConnection();
        if (isset($_GET['play'])) {
            $amount = mysqli_real_escape_string($mysqli, $_GET['amount']);
            $query = "INSERT INTO `balance`(`amount`,`user_id`) VALUES ($amount,$currentUserID)";
            if (mysqli_query($mysqli, $query)) {


                return true;
            } else {
                echo 'error';
            }


            return true;
        }
    }

}


?>