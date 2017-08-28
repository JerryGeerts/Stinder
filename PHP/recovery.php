<?php 
    include '../INCLUDES/header.php';
    include '../INCLUDES/config.php';
    include '../INCLUDES/recovery/mail.php';
    
    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        if(checkMail > 0){
            mail($_POST['email'], "Email verification Intern", $message, $headers);
        }
        else{
            $_POST['error'] = "This mail address is not registered";
        }

        function checkMail(){   
            INCLUDE '../INCLUDES/config.php';
            return ($conn->query("SELECT * FROM students WHERE email = '".$_POST['email']."';")->num_rows + $conn->query("SELECT * FROM companies WHERE email = '".$_POST['email']."';")->num_rows);
        }
    }
    
    if(!isset($_GET['s'])){
        include '../INCLUDES/recovery/recoverPassword.php';
    }
    else{
        include '../INCLUDES/recovery/changePassword.php';
    }

    include '../INCLUDES/footer.php';
?>
