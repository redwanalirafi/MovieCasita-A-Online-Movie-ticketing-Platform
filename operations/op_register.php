<?php

    session_start();

    include_once "db.php";

    $user = $_POST['reguser'];
    $pass = $_POST['regpass'];
    $phone = $_POST['regphone'];
    $mail = $_POST['regemail'];

    echo $user;

    if(empty($user)){
        header("Location: ../register.php?error=error");
        exit();
    }
    if(empty($pass)){
        header("Location: ../register.php?error=error");
        exit();
    }
    if(empty($phone)){
        header("Location: ../register.php?error=error");
        exit();
    }
    if(empty($mail)){
        header("Location: ../register.php?error=error");
        exit();
    }

    $sql = "insert into users (username,pass,phone,email,role) values ( '$user', '$pass','$phone','$mail', 'user' )";

    echo $sql;
    mysqli_query($conn,$sql);

?>