<?php 
    INCLUDE "../config.php";

    $query = $conn->query("SELECT * FROM studies WHERE schoolId = ".$_GET['id']);
    while ($row = $query->fetch_assoc()) {
        $data[] = $row['studyName'];
    }
    echo json_encode($data);
?>