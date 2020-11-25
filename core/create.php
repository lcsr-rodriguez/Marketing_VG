<?php

/**
 *    
 * create.php
 *    
 * Guarda la información en la tabla 'empresa'
 * 
 * @author     Leiner Ceballos
 * @version    1.0
 * @category   Back-end
 */

include("../config/database.php");

// Action click button
if(isset($_POST['btnGuardar']))
{
    $nombre = $_POST['nombre'];
    $representante = $_POST['representante'];
    $id_plan = $_POST['id_plan'];
    $precio = $_POST['precio'];
    
    /* check connection */
    if ($connection-> connect_errno) {
      echo "Failed to connect to MySQL: " . $connection-> connect_error;
      exit();
    } 

    $query = "INSERT INTO `empresa`(nombre, representante, id_plan, precio) VALUES ('$nombre', '$representante', $id_plan,'$precio')";
    $results = $connection->query($query);
    $connection->close(); // close connection

    var_dump($query);

    //session message
    $_SESSION['message_alert'] = 'Saved successfully';
    $_SESSION['color_alert'] = 'success';


    //Redirect to index
    $host  = $_SERVER['HTTP_HOST'];
    $index = 'index.php';
    header("Location: http://$host/$extra");
}

