<?php

       
    if(isset($_POST['submit'])){
        include_once 'db.php';

        $first = mysqli_real_escape_string($conn, $_POST['firstname']);
        $last = mysqli_real_escape_string($conn, $_POST['lastname']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $uid = mysqli_real_escape_string($conn, $_POST['username']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        //error handlers
    if(empty($first) || empty($last) || empty($email) || empty($uid) || empty($pwd)){
        header("Location: ../signin.php?signup=empty");
        exit();
    }else{
        //check for valid characters
        if(!preg_match("/^[a-zA-Z]*$/", $first)  || !preg_match("/^[a-zA-Z]*$/", $last) ){
            header("Location: ../signin.php?signup=invalid");
            exit();
        }else{
            //check for valid email
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signin.php?signup=email");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE username='$uid';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0){
                    header("Location: ../signin.php?signup=usertaken");
                    exit();
                }else{
                    //hash the password
                    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
                    //insert the user into the database
                    $sql = "INSERT INTO users (firstname,lastname,email,username,pwd) 
                    VALUES ('$first','$last','$email','$uid','$hashedPwd')";

                    mysqli_query($conn, $sql);
                    header("Location: ../signin.php?signup=success");
                    exit();
                }
            }   
        }
    }

    }else{
        header("Location: ../signin.php");
        exit();
    }
    


    
   

    