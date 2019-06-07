<?php

    if(isset($_POST['submit'])){
    include_once 'db.php';

    $firstname = mysqli_real_escape_string($conn, $_POST['firstname']);
    $lastname = mysqli_real_escape_string($conn, $_POST['lastname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occuppation']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);

    //error handlers
   
    if(empty($firstname) || empty($lastname) || empty($email) || empty($pwd) || empty($occupation) || empty($company)){
        header("Location: ../signin.php?signup=empty");
        exit();
    }else{
        //check for valid characters
        if(!preg_match("/^[a-zA-Z]*$/", $firstname) || !preg_match("/^[a-zA-Z]*$/", $lastname) || !preg_match("/^[a-zA-Z]*$/", $occupation) || !preg_match("/^[a-zA-Z]*$/", $company)){
            header("Location: ../index.php?signup=error");
            exit();
        }else{
            //check for valid email
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                header("Location: ../signin.php?signup=email");
                exit();
            }else{
                $sql = "SELECT * FROM users WHERE email = '$email';";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if($resultCheck > 0){
                    header("Location: ../signin.php?signup=emailtaken");
                    exit();
                }else{
                    //hash the password
                    $hashedPwd = $pasword_hash($pwd, PASSWORD_DEFAULT);

                    //insert into database
                    $sql = "INSERT INTO users (firstname, lastname, email, pwd, occupation, company) VALUES('$firstname','$lastname','$email','$hashedPwd','$occupation','$company');";

                    mysqli_query($conn, $sql);
                    header("Location: ../signin.php?signup=success");
                    exit();
                }
            }
        }
    }
    }else{
        header("Location: ../signup.php");
        exit();
    }