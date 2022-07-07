<?php

    include '../PHP/config.php';

    //Get changed password
    $new_password = mysqli_real_escape_string($conn, $_POST['new_passwd']);
    $confirm_new_passwd = mysqli_real_escape_string($conn, $_POST['new_passwd2']);

    //Update user password in database
    $update = mysqli_query($conn, "UPDATE users SET Passwd = '$new_passwd' && SET Password2 = '$confirm_new_passwd';");
    if($conn->query($update) === TRUE){
        header("Location: ../HTML/index.html");
        echo '<script type="text/javascript">alert("Password successfully update!");</script>';
        $to = $email;
        $from = 'rpi.alerts5@gmail.com';
        $headers = 'From: Noreply@cloudstorage.com';
        $subj = 'Noreply@cloudstorage.com: Password reset Cloud Storage';
        $msg = 'Your password has been successfully reset. If you did not authorize this, please contact our customer service team at rpi.alerts5@gmail.com.';
        mail($to, $subj, $msg, $headers);
    }
    else {
        die ('Error: Password could not be successfully updated!');
    }
    
    mysqli_close($conn);
?>