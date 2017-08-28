 <?php 
    session_start();	
    include "../config.php";     
    if($conn->query("INSERT into internships (companyId, description, studyName, amount) values (".$_SESSION['id'].",'".$_GET['desc']."','".$_GET['studyName']."',".$_GET['amount'].");") === TRUE){
       echo "ok";
    }    
    else{
        echo "fuck";
    }
?>