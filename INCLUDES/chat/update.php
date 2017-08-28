<?php
    session_start();	
    include "../config.php";
    
    if($_SESSION['type'] == "student"){
        $result = $conn->query("select chat.* from chat inner join Matches on Matches.matchId = chat.matchId inner join internships on internships.internId = Matches.internId where Matches.studentId = ".$_SESSION['id']." and internships.companyId = ".$_GET['ci'].";");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row[sendId] != $_SESSION['id']){
                    $print ="<div class='left'><p>".strip_tags($row[message])."</p><p>".explode(":", explode(" ",$row[date])[1])[0].":".explode(":", explode(" ",$row[date])[1])[1]."</p></div><br><br><br>";
                }
                else{
                    $print = "<div class='right'><p>".strip_tags($row[message])."</p><p>".explode(":", explode(" ",$row[date])[1])[0].":".explode(":", explode(" ",$row[date])[1])[1]."</p></div><br><br><br>";
                }
                echo $print;
            }
        }
    }
    elseif($_SESSION['type'] == "company"){
        $result = $conn->query("select chat.* from chat inner join Matches on Matches.matchId = chat.matchId inner join internships on internships.internId = Matches.internId where Matches.studentId = ".$_GET['si']." and internships.companyId = ".$_SESSION['id'].";");
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if($row[sendId] != $_SESSION['id']){
                    $print = "<div class='left'><p>".strip_tags($row[message])."</p><p>".explode(":", explode(" ",$row[date])[1])[0].":".explode(":", explode(" ",$row[date])[1])[1]."</p></div><br><br><br>";
                }
                else{
                    $print = "<div class='right'><p>".strip_tags($row[message])."</p><p>".explode(":", explode(" ",$row[date])[1])[0].":".explode(":", explode(" ",$row[date])[1])[1]."</p></div><br><br><br>";
                }
                echo $print;
            }
        }
    }
?>