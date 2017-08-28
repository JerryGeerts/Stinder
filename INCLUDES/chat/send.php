<?php
    session_start();	
    include "../config.php";
    if($_SESSION['type'] == "student"){
        if($conn->query("insert into chat (matchId, sendId, date, message) VALUES ((select matchId from Matches where studentId = ".$_SESSION['id']." and internId = (SELECT internId from internships where companyId = ".$_GET['id'].")), ".$_SESSION['id'].", ADDTIME(now(), '06:00:00'), '".$_GET['msg']."')") === TRUE){
            echo "";
        }
        else{
            echo "ERROR";
        }
    }
    elseif($_SESSION['type'] == "company"){
        if($conn->query("insert into chat (matchId, sendId, date, message) VALUES ((select matchId from Matches where studentId = ".$_GET['id']." and internId = (SELECT internId from internships where companyId = ".$_SESSION['id'].")), ".$_SESSION['id'].", ADDTIME(now(), '06:00:00'), '".$_GET['msg']."')") === TRUE){
            echo "";
        }
        else{
            echo "insert into chat (matchId, sendId, date, message) VALUES ((select matchId from Matches where studentId = ".$_GET['id']." and internId = (SELECT internId from internships where companyId = ".$_SESSION['id'].")), ".$_SESSION['id'].", ADDTIME(now(), '06:00:00'), '".$_GET['msg']."')";
        }
    }

?>
