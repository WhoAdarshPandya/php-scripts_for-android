<?php
    $response = array();
    define('DB_USER', "root"); // db user
    define('DB_PASSWORD', ""); // db password (mention your db password here)
    define('DB_DATABASE', "android_php"); // database name
    define('DB_SERVER', "localhost:1008");

    $db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE) or die(mysql_error());
    if(isset($_POST['id']))
    {
        $id = $_POST['id'];

        $result =mysqli_query($db,"delete from products where product_id = '$id'");
        if($result){
            $response["success"] = 1;
            $response["message"] = "User successfully deleted.";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["message"] = "failed to delete";
            echo json_encode($response);
        }
    }
    else{
        $response["success"] = 0;
        $response["message"] = "missing get/post params";
        echo json_encode($response);
    }
?>