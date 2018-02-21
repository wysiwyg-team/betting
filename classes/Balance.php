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

    public function getAmount()
    {
        $mysqli = db::getConnection();
        if (isset($_GET['play'])) {

            $amount = mysqli_real_escape_string($mysqli, $_GET['amount']);

            $query = "INSERT INTO `balance`(`amount`,`user_id`) VALUES ($amount,2)";
            if (mysqli_query($mysqli, $query)) {
                return true;
            } else {
                echo 'error';
            }
            return true;
        }


    }


    /**
     * get to know the current balance from table balance where user_id = user_id
     */
    public function currentBalance()
    {
        $mysqli = db::getConnection();
        $query2 = "SELECT amount FROM balance WHERE user_id=2";

        $result = mysqli_query($mysqli, $query2);
        while ($row = mysqli_fetch_row($result)) {
            echo '<br>';
            $var = $row[0];
            echo "balance is " . $var;
        }

    }


}


?>