<?php

namespace app;

use mysqli_sql_exception;

include 'vendor/autoload.php';

class db
{
    const databaseName = 'betting';
    const databasePassword = '';
    const databaseHost = 'localhost';
    const databaseUser = 'root';
    static $mysqli;
    static $instance = false;

    /**
     * db constructor.
     */
    public function __construct()
    {
        self::setConnection();
        self::$instance = true;
    }

    /**
     * @return mixed
     */
    public static function getConnection()
    {
        if (!self::$instance)
            self::setConnection();

        return self::$mysqli;
    }


    /**
     * @return mysqli_sql_exception
     */
    public static function setConnection()
    {

        self::$mysqli = mysqli_connect(self::databaseHost, self::databaseUser, self::databasePassword, self::databaseName);
        /* check connection */
        if (mysqli_connect_errno()) {
            return new mysqli_sql_exception("cannot connect to DB :" . mysqli_connect_error());
        }
    }
}


?>