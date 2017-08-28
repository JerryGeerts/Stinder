<?php 
    session_start();	
    include "../config.php";
    if($_SESSION['type'] == "student"){
        if($conn->query("INSERT INTO Matches (studentId,internId,status) VALUES (".$_SESSION['id'].",".$_GET['id'].",1);") === TRUE){
            $result = $conn->query("SELECT companies.*, internships.* FROM internships INNER JOIN studies on studies.studyName = internships.studyName inner join companies on companies.companyId = internships.companyId inner join students on students.studyId = studies.studyId left join Matches on students.studentId = Matches.studentId and internships.internId = Matches.internId where students.studentId = ".$_SESSION['id']." and Matches.status is null LIMIT 1");
	        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "profile.php?ci=".$row[companyId].";".$row[companyName].";".$row[internId].";".$row[email]."<br>".$row[firstName]." ".$row[lastName]."<br>".$row[city]."<br>".$row[street]."<br>".$row[postal]."<br>".$row[telephone].";".$row[avatar];
                }
            } 
            else{
                echo ";No Matches Left;";
            }
        }
        else{
            echo ";No Matches Left;";
        }
    }
    elseif($_SESSION['type'] == "company"){
        if($conn->query("UPDATE Matches SET status = 2 where matchId = ".$_GET['id'].";") === TRUE){
            $result = $conn->query("select * from Matches join internships join companies where studentId = ".$_SESSION['id']." and Matches.status > 1 and internships.internId = Matches.internId and companies.companyId = internships.companyId");
	        if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "profile.php?si=".$row[studentId].";".$row[firstName]." ".$row[lastName].";".$row[matchId].";".$row[email]."<br>".$row[firstName]." ".$row[lastName]."<br>".$row[city]."<br>".$row[street]."<br>".$row[postal]."<br>".$row[telephone].";".$row[avatar];
                }
            } 
            else{
                echo ";No Matches Left;";
            }
        }    
        else{
            echo ";No Matches Left;";
        }
    }
?>