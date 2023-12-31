<?php
    // Database connection
    include 'mySQLconnect.php';

    // Get values submitted from the login form
    $chatContent = $_POST["content"];
    $userName = $_POST["name"];
    $password = $_POST["password"];

    // Query to validate user login
    $query = "SELECT * FROM Chatroom WHERE Name = '$userName' AND Password = '$password'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0)
    {
        // Query to update database table given user login is valid
        $sql = "UPDATE Chatroom SET CHAT_CONTENT = '$chatContent' WHERE Name = '$userName' AND Password = '$password'";
        if (mysqli_query($con, $sql))
        {
            echo ' Chat Content updated ';
        }
    }
    else
    {
        echo ' The Data Entered for Username or Password is incorrect. Please check your data ';
    }
    mysqli_close($con);
?>