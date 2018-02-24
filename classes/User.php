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
    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function login($username, $password)
    {
        $mysqli = db::getConnection();
        $query = "SELECT user_id from users WHERE user_name='$username' AND password='$password'";
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

    /**
     * @param $username
     * @param $password
     * @return bool
     */
    public function check_login($username, $password)
    {
        $mysqli = db::getConnection();
        $query = "SELECT user_id from users WHERE user_name='$username' AND password='$password'";

        $result = mysqli_query($mysqli, $query);
        $user_data = mysqli_fetch_array($result);
        $count_row = $result->num_rows;

        if ($count_row == 1) {
            $_SESSION['login'] = true;
            $_SESSION['user_id'] = $user_data['user_id'];
            return true;
        } else {
            return false;
        }
    }

    /**
     * @return mixed
     */
    public function get_session()
    {
        return $_SESSION['login'];
    }

    public function get_userId($user_id){
        $mysqli = db::getConnection();

        $sql3="SELECT user_id FROM users WHERE user_id = $user_id";
            $result = mysqli_query($mysqli,$sql3);
            $user_data = mysqli_fetch_array($result);
            echo $user_data['user_id'];
        }


    /**
     * logout
     */
    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
}

?>