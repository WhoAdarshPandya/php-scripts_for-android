<?php
    $response = array();
    $response["users"] = array();
    define('DB_USER', "root"); // db user
    define('DB_PASSWORD', ""); // db password (mention your db password here)
    define('DB_DATABASE', "android_php"); // database name
    define('DB_SERVER', "localhost:1008");

    $db = mysqli_connect(DB_SERVER,DB_USER,DB_PASSWORD,DB_DATABASE) or die(mysql_error());
    $result = mysqli_query($db,"SELECT * FROM users");
    if(mysqli_num_rows($result) > 0)
    {
        while ($row = mysqli_fetch_array($result)) {
            $user = array();
            $user['name'] = $row["user_name"];
            $user['email'] = $row["user_email"];
            $user['password'] = $row["user_password"];
            array_push($response["users"],$user);
        }
        $response['success']=1;
        $response['message']="to fetch results";
        echo json_encode($response);
    }
    else{
        $response['success']=0;
        $response['message']="failed to fetch results";
        echo json_encode($response);
    }
?>