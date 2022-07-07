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
    else {
        echo 'Database connection successful';
    }

    if(isset($_POST['username'], $_POST['e-mail'], $_POST['passwd'], $_POST['passwd2'], $_POST['checkbox'])){
        $usr_name = mysqli_real_escape_String($conn, $_POST['username']);
        $email = mysqli_real_escape_String($conn, $_POST['e-mail']);
        $passwd = mysqli_real_escape_String($conn, $_POST['passwd']);
        $confirm_passwd = mysqli_real_escape_String($conn, $_POST['passwd2']);
        $checkbox = mysqli_real_escape_String($conn, $_POST['checkbox']);
    }
    

    $sql = mysqli_query($conn, "INSERT INTO users(UserName, Email, Passwd, Passwd2, Acknowledgement) VALUES('".$_POST['username']."', '".$_POST['e-mail']."', '".$_POST['passwd']."', '".$_POST['passwd2']."', '".$_POST['checkbox']."');");

    if($conn->query($sql) === TRUE){
        header("Location: ../HTML/index.html");
        echo 'Record Added Successfully!';
    }
    else {
        die ("Error" . "<br>" . $conn->error);
    }

    //echo'<script type="text/javascript">alert('Registration successful!');</script>';

    //$from = $email;
    //$subject = $subj;
    //$message_body = $msg;
    //$to = "james.bond.1998@hotmail.com";
    //mail($from, $to, $subject, $message_body);

    mysqli_close($conn);
?>