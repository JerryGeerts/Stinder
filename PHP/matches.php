<link rel="stylesheet" type="text/css" href="../CSS/matches.css">



<?php 
    INCLUDE "../INCLUDES/header.php"; 
?>
<div id="container">
    <h1>Matches</h1>
    <?php 
     if(!isset($_SESSION["id"])) {
            header("location: index.php");
        }

        if($_SESSION['type'] == "student"){
            $result = $conn->query("select * from Matches join internships join companies where studentId = ".$_SESSION['id']." and Matches.status > 1 and internships.internId = Matches.internId and companies.companyId = internships.companyId");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<a href='chat.php?ci=".$row[companyId]."'><p>".$row[companyName]."<img src='../AVATAR/".$row[avatar]."'></p></a><br>";
                }
            }
        }
        if($_SESSION['type'] == "company"){
            $result = $conn->query("select * from Matches join internships join students where internships.companyId = ".$_SESSION['id']." and Matches.status > 1 and Matches.internId = internships.internId and Matches.studentId = students.studentId");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<a href='chat.php?si=".$row[studentId]."'><p>".$row[firstName]." ".$row[lastName]."<img src='../AVATAR/".$row[avatar]."'></p></a><br>";
                }
            }
        }
        echo "</div>";
        INCLUDE "../INCLUDES/footer.php";
    ?>





