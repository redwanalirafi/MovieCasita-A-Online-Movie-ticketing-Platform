<?php

    session_start();

    include_once "operations/db.php";

    $user = $_POST['loguser'];
    $pass = $_POST['logpass'];

    if(empty($user)){
        header("Location: login.php?error=Enter username");
        exit();
    }
    if(empty($pass)){
        header("Location: login.php?error=Enter password");
        exit();
    }

    $sql = "select * from users where username='$user' and pass='$pass'";


    $result=mysqli_query($conn,$sql);

    if(mysqli_num_rows($result)==1){
        echo "login success";
        $row=mysqli_fetch_assoc($result);
        //echo "Logged in";
        $_SESSION['username']=$user;
        
        if($row['role']=="admin"){
            $_SESSION['role']="admin";
        }
        else if($row['role']=="staff"){
            $_SESSION['role']="staff";
        }
        else{
            $_SESSION['role']="user";
            echo "<script>top.window.location = './index.php'</script>";
        }
        //if($_SESSION['role']!="user")header("Location: /index.php");
        //else header("Location: index.php");
    }
    else{
        //header("Location: login.php?error=wrong password");
    }
        
    mysqli_close($conn);



?>