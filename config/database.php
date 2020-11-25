<?php

/**
 *    
 * database.php
 *    
 * Returns the connection to the database 
 * 
 * @author     Leiner Ceballos
 * @version    1.0
 * @category   Database    
 */

session_start();

$host = 'localhost';
$user = 'root';
$password = '';
$db_name = 'db_test';

$connection = new mysqli($host, $user, $password, $db_name);

?>