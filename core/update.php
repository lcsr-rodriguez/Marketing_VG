<?php

/**
 *    
 * update.php
 *    
 * Refresh information in the table 'info'
 * 
 * @author     Leiner Ceballos
 * @version    1.0
 * @category   Back-end
 */


include("../config/database.php");

if(isset($_POST["update_info"]))
{
    $id = $_GET["id"];
    $fullname = $_POST["fullname"];
    $description = $_POST["description"];
    
    /* check connection */
    if ($connection-> connect_errno) {
      echo "Failed to connect to MySQL: " . $connection-> connect_error;
      exit();
    } 

    $query = "UPDATE `info` SET `name`='$fullname', `description`='$description' WHERE `id`='$id'";
    $response = $connection->query($query);

    $_SESSION['message_alert'] = "Done! data has been updated";
    $_SESSION['color_alert'] = "primary";

    //Redirect to index
    $host  = $_SERVER['HTTP_HOST'];
    $index = 'index.php';
    header("Location: http://$host/$extra");

}


