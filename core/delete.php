<?php

/**
 *    
 * delete.php
 *    
 * Delete information in the table 'info'
 * 
 * @author     Leiner Ceballos
 * @version    1.0
 * @category   Back-end
 */

include("../config/database.php");

if(isset($_GET["id"]))
{
    $id = $_GET["id"];

    /* check connection */
    if ($connection-> connect_errno) {
      echo "Failed to connect to MySQL: " . $connection-> connect_error;
      exit();
    } 

    $query = "DELETE FROM `info` WHERE id=$id";
    $action = $connection->query($query); // Delete a row

    if(!$action){
        die("Error");
    }

    $_SESSION['message_alert'] = "Alert! You have deleted a register";
    $_SESSION['color_alert'] = "danger";

    //Redirect to index
    $host  = $_SERVER['HTTP_HOST'];
    $index = 'index.php';
    header("Location: http://$host/$extra");
     
}

?>