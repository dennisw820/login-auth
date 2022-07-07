<?php
    include '../PHP/config.php';

    //Get Email
    if(isset($_POST['usr_name'], $_POST['reset_passwd'])){
        $usr_name = mysqli_real_escape_String($conn, $_POST['usr_name']);
        
    }
    
    //Check if email exist
    $sql = mysqli_query($conn, "SELECT Email FROM users WHERE Email='$email';");

    //If email exist, email password reset link
    if($conn->query($sql) === TRUE){
        $to = $email;
        $from = 'rpi.alerts5@gmail.com';
        $headers = 'From: Noreply@cloudstorage.com';
        $subj = 'Noreply@cloudstorage.com: Password reset Cloud Storage';
        $msg = 'Click on this <a target="_blank" href="../HTML/forgot-passwd.html">link</a> to reset your password. You will be redirected to a web page where you will enter a new password and upon success, the password will be updated successfully.';
        mail($to, $subj, $msg, $headers);
    }
    else {
        die ('Error' . $sql . '<br>' . $conn->error);
    }

    mysql_close($conn);
?>