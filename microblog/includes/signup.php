<?php
    include_once './includes/db.php';

    $first = mysqli_real_escape_string($conn, $_POST['first']);
    $last = mysqli_real_escape_string($conn, $_POST['last']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $occupation = mysqli_real_escape_string($conn, $_POST['occuppation']);
    $company = mysqli_real_escape_string($conn, $_POST['company']);

    $sql = "INSERT INTO users (first,last,email,pwd,occupation,company) 
    VALUES ('$first','$last','$email','$pwd','$occupation','$company');";

    mysqli_query($conn,$sql);

    header("Location: ../index.php?signup=success");