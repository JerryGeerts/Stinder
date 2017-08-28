<?php 
    session_start();
    include("../INCLUDES/config.php");

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        else {
            if(isset($_POST['password']) && !isset($_POST['lName'])) {
                $result = $conn->query("SELECT password,EmailConfirmed,studentId FROM students WHERE email = '".$_POST['email']."';");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        if (password_verify($_POST['password'] , $row['password'] )) {
                            if ($row["EmailConfirmed"] != "1") {
                                $error = "<p id='error'>confirm your email</p>";
                            }
                            else {
                                $_SESSION["id"] = $row['studentId'];
                                $_SESSION["type"] = "student";
                                header("location: main.php");
                            }
                        }
                        else {
                            header("location: index.php");
                            $error = "<p id='error'>wrong password or username</p>";
                        }
                    }
                } 
                else{
                    $result = $conn->query("SELECT password,EmailConfirmed,companyId FROM companies WHERE email = '".$_POST['email']."';");
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            if (password_verify($_POST['password'] , $row['password'] )) {
                                if ($row["EmailConfirmed"] != "1") {
                                    $error = "<p id='error'>confirm your email</p>";
                                }
                                else {
                                    $_SESSION["id"] = $row['companyId'];
                                    $_SESSION["type"] = "company";
                                    header("location: main.php");
                                }
                            }
                            else {
                                header("location: index.php");
                                $error = "<p id='error'>wrong password or username</p>";
                            }
                        }
                    }
                    else {
                        header("location: index.php");
                        $error = "<p id='error'>wrong password or username</p>";
                    }
                    $conn->close();
                }
            }
        }
    }
 ?>

<!DOCTYPE HTML>
<html>

<head>
    <link rel="stylesheet" href="../CSS/header.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/stylesheet.css">
    <link rel="stylesheet" href="../CSS/bootstrap.css">
    <link rel="stylesheet" href="../CSS/bootstrap-theme.css">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="https://code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
</head>

<body>
    <div>
        <nav>
            <?php
                if(isset($_SESSION['id'])){
                    echo '
                        <a href="main.php">Home</a>
                        <span></span>
                        <a href="profile.php">Profile</a>
                        <span></span>
                        <a href="matches.php">Matches</a>
                        <a id="logout" href="logout.php">LOGOUT</a>
                    ';

            
                }
                else{
                    echo '
                        <a href="index.php">Home</a>
                        <span></span>
                        <a href="">About</a>
                        <span></span>
                        <a href="">Contact</a>
                        <form action="" method="post">
                            <input name="email" placeholder="Email" type="email">
                            <input name="password" placeholder="Password" type="password">
                            <input type="submit" id="submit" class="myButton" value="sign in">
                        </form>
                    ';
                }
            ?>
        </nav>
    </div>