<?php
    include "mail.php";
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT, array('cost' => 12));
    $emailString =  substr( "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ" ,mt_rand( 0 ,51 ) ,1 ) .substr( md5( time() ), 1);
    $post = str_replace(' ', '', $_POST['postal']);

    $location = '../AVATAR/';
    $filename = $_FILES['fileToUpload']['name'];
    $tmp_name = $_FILES['fileToUpload']['tmp_name'];

    $imageFileType = pathinfo($_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
    $newname = $emailString.".".$imageFileType;
       


    if($_POST['type'] == "student"){
        $query = $conn->query("SELECT studyId FROM studies WHERE schoolId ='{$_POST['school']}' AND studyName = '{$_POST['study']}'");
        while ($row = $query->fetch_assoc()) { $studyId = $row['studyId']; }
        $conn->query("INSERT INTO students (studyId, firstName, lastName, city, street, postal, email,  password, telephone, emailConfirmed, emailString, avatar) 
            VALUES ('{$studyId}', '{$_POST['fName']}', '{$_POST['lName']}', '{$_POST['city']}', '{$_POST['street']}', '{$post}','{$_POST['email']}', '{$password}' , '{$_POST['tel']}', false, '{$emailString}' , '{$newname}');");
    }
    elseif($_POST['type'] == "company"){
        $conn->query("INSERT INTO companies (companyName, email, firstName, lastName, telephone, city,  street, postal, password, emailConfirmed, emailString, avatar) 
            VALUES ('{$_POST['cName']}', '{$_POST['email']}', '{$_POST['fName']}', '{$_POST['lName']}', '{$_POST['tel']}', '{$_POST['city']}', '{$_POST['street']}' , '{$post}', '{$password}', false, '{$emailString}' , '{$newname}');");
    }
    

    mail($_POST['email'], "Email verification Intern", $message, $headers);
    
    if (move_uploaded_file($tmp_name, $location.$newname)) {
                echo " <p>Thanks for registering!</p>";
    }
    else {
        echo "<p>something went wrong with uploading your picture, please try to login first. If that doesnt work contact us.</p>";
    }



    
?>
   
