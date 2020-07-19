<?php 
    // connecting with the database
    $conn = new mysqli($CONFIG['DB_SERV'], $CONFIG['DB_USER'], $CONFIG['DB_PASS'], $CONFIG['DB_NAME']); 
  
    // setting variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];                

    // query the name, email, subject and message from the databalse
    $query = "INSERT INTO `messages` (`name`, `email`, `subject`, `message`) VALUES ('$name', '$email', '$subject', '$message')";

    $result = $conn->query($query);

    if (!$result) {
        echo ('Invalid query: ' . mysql_error());
    } 
    else {
        echo "working";
    }

    $conn->close();
?>