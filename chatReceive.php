<?php
    // Database connection
    include 'mySQLconnect.php';
    
    // Get values submitted from the listen form
    $nameListen = $_GET["nameR"];

    // Query to validate name entry
    $query = "SELECT * FROM Chatroom WHERE Name = '$nameListen'";
    $result = mysqli_query($con, $query);
    $count = mysqli_num_rows($result);

    if ($count > 0)
    {
        // Query to retrieve chat content from database given user exists
        $sql = "SELECT CHAT_CONTENT From Chatroom WHERE Name = '$nameListen'";
        if ($ans = mysqli_query($con, $sql))
        {
            $row = mysqli_fetch_assoc($ans);
            echo $row['CHAT_CONTENT'];
        }
    }
    else
    {
        echo '';
    } 
    mysqli_close($con);
?>