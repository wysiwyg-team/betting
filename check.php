<?php
/**
 * Created by PhpStorm.
 * User: Cathy ICD
 * Date: 23/02/2018
 * Time: 14:34
 */

namespace app;
include 'vendor/autoload.php';
$_POST['amount']=60;
$_POST['user_id']=2;

class check
{

    public function checkBalance()
    {
        $mysqli = db::getConnection();


        $amt = $_POST['amount'];
        $user_id = $_POST['user_id'];
//
        $query = "SELECT amount FROM balance WHERE user_id=$user_id ORDER BY balance_id DESC LIMIT 1";
//     die;

        $result = mysqli_query($mysqli, $query);
        while ($row = mysqli_fetch_array($result)) {
            echo '<br>';
            $balance = $row['amount'];
//          echo $balance;
        }
//        echo $balance;
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