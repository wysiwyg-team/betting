<?php
/**
 * Created by PhpStorm.
 * User: Cathy ICD
 * Date: 23/02/2018
 * Time: 08:18
 */

use app\favGames;
include 'vendor/autoload.php';

$favGames= new favGames();

$favGames->getFavGames();

?>