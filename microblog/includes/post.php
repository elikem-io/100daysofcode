<?php
    if(isset($_POST['submit'])){
        include 'db.php';
        //get the values of the form
        $title = mysqli_real_escape_string($conn, $_POST['title']);
        $author = mysqli_real_escape_string($conn, $_POST['author']);
        $content = mysqli_real_escape_string($conn, $_POST['content']);
        $date = date("m,d");

        //validate the form
        if(empty($title) || empty($author) || empty($content)){
            header("Location: ../form.php?upload=empty");
            exit();
        }else{
            if(!preg_match("/^[a-zA-Z]*$/", $author) ){
                header("Location: ../form.php?signup=invalid");
                exit();
            }else{
                $sql = "INSERT INTO blogposts (subject, author, content) 
                 VALUES (?,?,?)"; 
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)){
                    header("Location: ../form.php?upload=failed");
                    exit();
                }else{
                    mysqli_stmt_bind_param($stmt, "sss", $title, $author, $content);
                    mysqli_execute($stmt);
                    header("Location: ../index.php?upload=success");
                    exit();
                }
               
            }
        }

    }else{
        header("Location: ../form.php?upload=error");
        exit();
    }



    //  //insert the values into the tables
    //  $sql = "INSERT INTO blogposts (subject, author, content) 
    //  VALUES ('$title','$author','$content')";
    //  mysqli_query($conn, $sql);
    //  header("Location: ../form.php?upload=success");
    //  exit();