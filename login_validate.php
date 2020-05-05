<?php
    $response = array();
    define('DB_USER', "root"); // db user
    define('DB_PASSWORD', ""); // db password (mention your db password here)
    define('DB_DATABASE', "android_php"); // database name
    define('DB_SERVER', "localhost:1008");
 
    $db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE) or die(mysql_error());
    if(isset($_POST['email']))
    {
        $email = $_POST['email'];
        $result = mysqli_query($db,"SELECT * FROM users where user_email = '$email'");
        if(mysqli_num_rows($result) > 0)
        {
            while ($row = mysqli_fetch_array($result)) {
                $response["password"] = $row["user_password"];
                $response["user_name"] = $row["user_name"];
            }
            $response['success']=1;
            $response['message']="fetch results";
            echo json_encode($response);
        }
        else{
            $response['success']=0;
            $response['message']="failed to fetch results";
            echo json_encode($response);
        }
    }
    else{
        $response['success'] = 0;
        $response['message'] = "login failed";
        echo json_encode($response);
    }
?>