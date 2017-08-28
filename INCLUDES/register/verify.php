<?php
    include "../config.php";
    include "../header.php";

    #Make sure connection is working
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    else {
        #if there is a student with the email conformation string and email isnt confirmed yet then activate it
        if($conn->query("SELECT * FROM students WHERE emailString = '{$_GET['s']}' AND emailConfirmed = 0;")->num_rows > 0){
            $conn->query("UPDATE students SET emailConfirmed = '1' WHERE emailString = '{$_GET['s']}';");
            echo "Email confirmed!";
        }
        #else if the conformation string does exist but its already active
        elseif($conn->query("SELECT * FROM students WHERE emailString = '{$_GET['s']}' AND emailConfirmed = 1;")->num_rows > 0){
            echo "You already confirmed your email!";
        }
        #if the string doesnt exist
        else{
            echo "No string like that found";
        }
    }
    include "../footer.php";
?>