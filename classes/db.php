<?php
namespace app;

include 'vendor/autoload.php';

class db
{
    const databaseName = 'betting';
    const databasePassword = '';
    const databaseHost = 'localhost';
    const databaseUser = 'root';
    static $mysqli;
    static $instance = false;

    public function __construct()
    {
        self::setConnection();
        self::$instance = true;
    }


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