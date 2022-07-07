<?php

    $host = '192.168.1.125';
    $username = 'remote-user';
    $passwd = 'Fivecays123$';
    $db = 'login';
    
    $conn = new_mysqli($host, $username, $passwd, $db);

    if($conn->connect_error){
        echo 'Connection failed.' .$conn->connect_error;
        exit();
    }
    else {
        
    }
?>