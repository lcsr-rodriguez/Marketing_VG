<?php

/**
 *    
 * edit.php
 *    
 * Edit information in the table 'info'
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

    $query = "SELECT * FROM `info` WHERE `id`='$id'";
    $response = $connection->query($query);
    /* determine number of rows result set */
    if($response->num_rows == 1){
        $data = $response->fetch_assoc();
        $id = $data["id"];
        $fullname = $data["name"];
        $description = $data["description"];
    }
}
 
?>
    
<?php include("../views/header.php"); ?>

<body>
    <?php require '../views/navigation.php'; ?>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
                <div class="card card-body">
                <h3>INFO: </h3>
                <!-- Form --> 
                    <form action="update.php?id=<?php echo $id; ?>" method="post">
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                            <input type="text" value="<?php echo $fullname ?>" name="fullname" id="fullname" autofocus class="form-control"> 
                            </div>
                        </div> 
                        <div class="form-group">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-envelope-open-text"></i></span>
                                </div>
                            <input type="text" value="<?php echo $description ?>" name="description" id="description" class="form-control"> 
                            </div>
                        </div> 
                        <button type="submit" name="update_info" class="btn btn-success">
                            Update 
                        </button>
                    </form>
                </div> 
            </div> 
        </div>
    </div>
</body>

<? include("../views/footer.php"); ?>