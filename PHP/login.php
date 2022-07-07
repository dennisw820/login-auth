<?php
    $dbServerName = "192.168.1.125";
    $dbUserName = "remote-user";
    $dbPasswd = "Fivecays123$";
    $dbName = "login";

    $conn = new mysqli($dbServerName, $dbUserName, $dbPasswd, $dbName);

    if($conn->connect_error) {
        die ("Failed to connect to MySQL: " . $conn->connect_error);
        exit();
    }

    //Get Login credentials input
    $user_name = $_POST['usrname'];
    $passwd = $_POST['passwd'];

    //Validate Login credentials
    $sql = mysqli_query($conn,"SELECT Email, Passwd FROM users WHERE Email='$user_name' and Passwd='$passwd';");
    
    if(mysqli_num_rows($sql) > 0) {
        while($row = mysqli_fetch_assoc($sql)){
            $id = $row['ID'];
            $email = $row['Email'];
            session_start();
            $_SESSION['id'] = $id;
            $_SESSION['email'] = $user_name;
        
        }
        header("Location: ../HTML/index.html");
        echo'Welcome, ' .$user_name .'!';
    }
    else {
        die ('Error: Please check user name or password and try again.');
    }
?>