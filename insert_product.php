<?php
    $response = array();
    define('DB_USER', "root"); // db user
    define('DB_PASSWORD', ""); // db password (mention your db password here)
    define('DB_DATABASE', "android_php"); // database name
    define('DB_SERVER', "localhost:1008");

    $db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE) or die(mysql_error());
    if(isset($_POST['name']) && isset($_POST['price']))
    {
        $name = $_POST['name'];
        $price = $_POST['price'];

        $result =mysqli_query($db,"INSERT INTO products(product_name,product_price) VALUES ('$name','$price')");
        if($result){
            $response["success"] = 1;
            $response["message"] = "User successfully Inserted.";
            echo json_encode($response);
        }else{
            $response["success"] = 0;
            $response["message"] = "failed to insert";
            echo json_encode($response);
        }
    }
    else{
        $response["success"] = 0;
        $response["message"] = "missing get/post params";
        echo json_encode($response);
    }
?>