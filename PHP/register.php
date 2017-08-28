<?php 
    INCLUDE "../INCLUDES/header.php"; 
    INCLUDE "../INCLUDES/config.php";



    if($_SERVER["REQUEST_METHOD"] == "POST"){ 
        if(!validateForm()){
            if($_POST['type'] == "student"){
                INCLUDE "../INCLUDES/register/studentRegister.php";
            }
            elseif($_POST['type'] == "company"){
                INCLUDE "../INCLUDES/register/companyRegister.php";
            }
        }
        else{
            INCLUDE "../INCLUDES/register/registered.php";
        }
    }
    elseif($_GET['type'] == "company"){
        INCLUDE "../INCLUDES/register/companyRegister.php";
    }
    else{
        INCLUDE "../INCLUDES/register/studentRegister.php";
    }

    INCLUDE "../INCLUDES/footer.php";

    function validateForm(){
        $valid = true;
        if(strlen($_POST['type']) > 0){
            #COMPANY
            if(strtolower($_POST['type']) == "company"){
                $imageFileType = pathinfo('../AVATAR/'.$_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
                #EMAIL
                if(strlen($_POST['email']) < 1){
                    $_POST['emailError'] = "Please enter a emailaddres!";
                    $valid = false;
                }
                elseif(strpos($_POST['email'], '@') == false && strpos($_POST['email'], '.') == false ){
                    $_POST['emailError'] = "Please enter a valid emailaddres!";
                    $valid = false;
                }
                elseif(checkMail() > 0){
                    $_POST['emailError'] = "This email is already in use!";
                    $valid = false;
                }
                #FIRSTNAME
                if(strlen($_POST['fName']) < 1){
                    $_POST['fNameError'] = "Please enter a first name!";
                    $valid = false;
                }
                #LASTNAME
                if(strlen($_POST['lName']) < 1){
                    $_POST['lNameError'] = "Please enter a last name!";
                    $valid = false;
                }
                #COMPANYNAME
                if(strlen($_POST['cName']) < 1){
                    $_POST['cNameError'] = "Please enter a Company name!";
                    $valid = false;
                }
                elseif(checkCompany() > 0){
                    $_POST['cNameError'] = "This company is already registered!";
                    $valid = false;
                }
                #CELLPHONE
                if(strlen($_POST['tel']) < 1){
                    $_POST['telError'] = "Please enter a cellphone number!";
                    $valid = false;
                }
                #CITY
                if(strlen($_POST['city']) < 1){
                    $_POST['cityError'] = "Please enter a city name!";
                    $valid = false;
                }
                #STREET
                if(strlen($_POST['street']) < 1){
                    $_POST['streetError'] = "Please enter a street name!";
                    $valid = false;
                }
                #POSTALCODE
                if(strlen($_POST['postal']) < 1){
                    $_POST['postalError'] = "Please enter a postalcode!";
                    $valid = false;
                }
                elseif(strlen($_POST['postal']) < 6){
                    $_POST['postalError'] = "Please enter a valid postalcode!";
                    $valid = false;
                }
                #PASSWORD
                if(strlen($_POST['password']) < 1){
                    $_POST['passwordError'] = "Please enter a password!";
                    $valid = false;
                }
                elseif(strlen($_POST['password']) < 8){
                    $_POST['passwordError'] = "Please enter a password that is longer then 8 characters";
                    $valid = false;
                }
                #PASSWORD2
                elseif(strlen($_POST['password2']) < 1){
                    $_POST['password2Error'] = "Please confirm the password you entered!";
                    $valid = false;
                }
                #PASSWORDCONFIRM
                elseif($_POST['password2'] != $_POST['password']){
                    $_POST['confirmedError'] = "The passwords you enter do not match!";
                    $valid = false;
                }
                #CHECK IF IMAGE IS LEGIT
                elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $valid = false;

                }
                elseif ($_FILES["fileToUpload"]["size"] > 1000000 ) {
                    echo "Sorry, your file is too large.";
                    $valid = false;
                }
                return $valid;
            }
            #STUDENT
            elseif(strtolower($_POST['type']) == "student"){
                $imageFileType = pathinfo('../AVATAR/'.$_FILES['fileToUpload']['name'],PATHINFO_EXTENSION);
                #EMAIL
                if(strlen($_POST['email']) < 1){
                    $_POST['emailError'] = "Please enter a emailaddres!";
                    $valid = false;
                }
                elseif(strpos($_POST['email'], '@') == false && strpos($_POST['email'], '.') == false ){
                    $_POST['emailError'] = "Please enter a valid emailaddres!";
                    $valid = false;
                }
                elseif(checkMail() > 0){
                    $_POST['emailError'] = "This email is already in use!";
                    $valid = false;
                }
                #FIRSTNAME
                if(strlen($_POST['fName']) < 1){
                    $_POST['fNameError'] = "Please enter a first name!";
                    $valid = false;
                }
                #LASTNAME
                if(strlen($_POST['lName']) < 1){
                    $_POST['lNameError'] = "Please enter a last name!";
                    $valid = false;
                }
                #CITY
                if(strlen($_POST['city']) < 1){
                    $_POST['cityError'] = "Please enter a city name!";
                    $valid = false;
                }
                #STREET
                if(strlen($_POST['street']) < 1){
                    $_POST['streetError'] = "Please enter a street name!";
                    $valid = false;
                }   
                #POSTALCODE
                if(strlen($_POST['postal']) < 1){
                    $_POST['postalError'] = "Please enter a postalcode!";
                    $valid = false;
                }
                elseif(strlen($_POST['postal']) < 6){
                    $_POST['postalError'] = "Please enter a valid postalcode!";
                    $valid = false;
                }
                #CELLPHONE
                if(strlen($_POST['tel']) < 1){
                    $_POST['telError'] = "Please enter a cellphone number!";
                    $valid = false;
                }
                #SCHOOL
                if(!isset($_POST['school'])){
                    $_POST['schoolError'] = "Please select the school you are attending!";
                    $valid = false;
                }
                #STUDY
                elseif(!isset($_POST['study'])){
                    $_POST['studyError'] = "Please select the study you are doing!";
                    $valid = false;
                }
                #PASSWORD
                if(strlen($_POST['password']) < 1){
                    $_POST['passwordError'] = "Please enter a password!";
                    $valid = false;
                }
                elseif(strlen($_POST['password']) < 8){
                    $_POST['passwordError'] = "Please enter a password that is longer then 8 characters";
                    $valid = false;
                }
                #PASSWORD2
                elseif(strlen($_POST['password2']) < 1){
                    $_POST['password2Error'] = "Please confirm the password you entered!";
                    $valid = false;
                }
                #PASSWORDCONFIRM
                elseif($_POST['password2'] != $_POST['password']){
                    $_POST['confirmedError'] = "The passwords you enter do not match!";
                    $valid = false;
                }
                #CHECK IF IMAGE IS LEGIT
                elseif ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $valid = false;


                }
                elseif ($_FILES["fileToUpload"]["size"] > 1000000 ) {
                    echo "Sorry, your file is too large.";
                    $valid = false;
                }
                return $valid;
            }
        }
    }

    function checkMail(){   
        INCLUDE "../INCLUDES/config.php";
        return ($conn->query("SELECT * FROM students WHERE email = '".$_POST['email']."';")->num_rows + $conn->query("SELECT * FROM companies WHERE email = '".$_POST['email']."';")->num_rows);
    }

    function checkCompany(){
        INCLUDE "../INCLUDES/config.php";
        return $conn->query("SELECT * FROM companies WHERE companyName = '".$_POST['cName']."';")->num_rows;
    }
?>