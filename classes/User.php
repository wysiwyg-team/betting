<?php

namespace app;

/**
 * Created by PhpStorm.
 * User: Ankush
 * Date: 2/9/2018
 * Time: 9:24 AM
 */
include 'vendor/autoload.php';

class User
{

    public function login($username, $password)
    {
        $mysqli = db::getConnection();

        $query = "SELECT user_id from user WHERE user_name='$username' and password='$password'";
        $result = mysqli_query($mysqli, $query);
        $row = mysqli_fetch_array($result);
        $count_row = $result->num_rows;
        if ($count_row == 1) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $row['user_id'];
            return true;
        } else {
            return false;
        }
    }


    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }



}

?>