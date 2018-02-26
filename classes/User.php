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
    private $user_id;
    private $username;
    private $user_status;
    private $password;

    /**
     * User constructor.
     * @param bool $user_id
     */
    public function __construct($user_id = true)
    {
        if ($user_id != false) {
            $mysqli = db::getConnection();

            $query = "SELECT * from users WHERE user_id=$user_id";
            $result = mysqli_query($mysqli, $query);
            $row = mysqli_fetch_array($result);
            $count_row = $result->num_rows;
            if ($count_row == 1) {
                $_SESSION['login'] = true;
                $_SESSION['user_id'] = $row['user_id'];

                $this->user_id = $row['user_id'];
                $this->username = $row['user_name'];
                $this->user_status = $row['user_status'];
                $this->password = $row['password'];
                return true;
            } else {
                return false;
            }
        }
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getUserStatus()
    {
        return $this->user_status;
    }

    /**
     * @param mixed $user_status
     */
    public function setUserStatus($user_status): void
    {
        $this->user_status = $user_status;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * @param mixed $user_id
     */
    public function setUserId($user_id): void
    {
        $this->user_id = $user_id;
    }

//    /**
//     * @param $username
//     * @param $password
//     * @return bool
//     */
//    public function login($username, $password)
//    {
//        $mysqli = db::getConnection();
//        $query = "SELECT * from users WHERE user_name='$username' AND password='$password'";
//        $result = mysqli_query($mysqli, $query);
//        $row = mysqli_fetch_array($result);
//        $count_row = $result->num_rows;
//        if ($count_row == 1) {
//            $_SESSION['login'] = true;
//            $_SESSION['user_id'] = $row['user_id'];
//
//            $this->user_id = $row['user_id'];
//            $this->username = $row['user_name'];
//            $this->user_status = $row['user_status'];
//            $this->password = $row['password'];
//
//            return true;
//        } else {
//
//
//            return false;
//        }
//    }

    /**
     * @param $username
     * @param $password
     * @return bool
     * Check if user exists in database
     */
    public function isUserValid($username, $password)
    {
        $mysqli = db::getConnection();
        $query = "SELECT user_id from users WHERE user_name='$username' AND password='$password'";
        $result = mysqli_query($mysqli, $query);
        $count_row = $result->num_rows;

        if ($count_row == 1) {

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


    /**
     * Logout
     */
    public function logout()
    {
        $_SESSION['login'] = false;
        session_destroy();
    }
}

?>