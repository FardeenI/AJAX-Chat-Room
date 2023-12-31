<?php
// Database connection
include 'mySQLconnect.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Fardeen Iqbal IT202 Project 5 - Chatroom</title>
        <link rel="stylesheet" href="chatStyles.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <script src="chatScript.js"></script>
    </head>

    <body>
        <div id="nameList">
            <h3>Available Persons to Chat with:     
            <?php
                // List of Valid Users
                echo "<span>&nbsp&nbsp</span>";
                $query = "SELECT Name FROM Chatroom";
                $result = $con->query($query);
                while ($row = mysqli_fetch_assoc($result))
                {
                    echo "<span>{$row['Name']}</span>";
                    echo "<span>&nbsp|&nbsp</span>";
                }
            ?>
            </h3>
        </div>
        
        <form id="chatSend">
            <p>
                <label for="nameSend">ENTER YOUR NAME:</label>
                <input type="text" id="nameSend" name="nameSend">
            </p>

            <p>
                <label for="pass">ENTER YOUR PASSWORD:</label>
                <input type="password" id="pass" name="pass">
            </p>

            <p>
                CONTENT TRANSMITTED AS TYPED:
            </p>

            <p>
                <input type="text" class="chat" id="chatInput" name="chat">
            </p>

            <p>
                <input type="text" id="warning">
            </p>
        </form>
        
        <form id="chatReceive">
            <p>
                <label for="nameReceive">ENTER VALID NAME & RETRIEVE CHAT</label>
                <input type="text" id="nameReceive" name="nameReceive">
                <!-- LISTEN BUTTON
                <button type="button" id="listen">Listen</button>
                -->
            </p>

            <p>
                RETRIEVED CONTENT:
            </p>

            <p>
                <input type="text" class="chat" id="chatOutput" name="chat">
            </p>
        </form>
    </body>
</html>