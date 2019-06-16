<?php
    session_start();

    if(isset($_POST['submit'])){
        include 'db.php';

        $uid = mysqli_real_escape_string($conn, $_POST['username']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        //error handlers
        //check if inputs are empty
        if(empty($uid) || empty($pwd)){
            header("Location: ../signin.php?login=empty");
            exit();
        }
        else{
            $sql = "SELECT * FROM users WHERE username='$uid' OR email = '$uid';";
            $result = mysqli_query($conn, $sql);
            $resultCheck = mysqli_num_rows($result);

            //check if the result matches any username 
            if($resultCheck < 1){
                header("Location: ../signin.php?login=nouser");
                exit();
            }
            else{
                if($row = mysqli_fetch_assoc($result)){
                    //dehashing the password
                    $hashedPwdCheck = password_verify($pwd, $row['pwd']);
                    if($hashedPwdCheck == false){
                        header("Location: ../signin.php?login=pass");
                        exit();
                    }
                    elseif($hashedPwdCheck == true){
                        //login the user here
                        $_SESSION['u_id'] = $row['id'];
                        $_SESSION['u_first'] = $row['firstname'];
                        $_SESSION['u_last'] = $row['lastname'];
                        $_SESSION['u_email'] = $row['email'];
                        $_SESSION['u_username'] = $row['username']; 
                        header("Location: ../form.php?login=success");
                        exit();
                    }
                }
            }
        }
    }else{
            header("Location: ../signin.php?login=notclicked");
            exit();
        }
    