<?php
    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $mailFrom = $_POST['mail'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $mailTo = "ielikemamevor@gmail.com";

        $header = "From :". $mailFrom;
        $txt = "You have received an email from ". $name . "\n\n". $message;

        mail($mailTo, $subject, $txt);
        header("Location: index.php?mail=sent");
    }