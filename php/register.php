<?php 
    
    // connecting with the database
    $conn = new mysqli($CONFIG['DB_SERV'], $CONFIG['DB_USER'], $CONFIG['DB_PASS'], $CONFIG['DB_NAME']);
    
    // setting variables
    $username = $_POST['username'];        
    $fullName = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];        

    // query the username, password, name and email from the databalse
    $query = "INSERT INTO `users` (`username`, `name`, `email`, `password`) VALUES ('$username', '$fullName', '$email', '$password')";

    $result = $conn->query($query);

    if (!$result) {
        echo ('Invalid query: ' . mysql_error());
    } 
    else {
        echo "working";
    }

    $conn->close();
?>