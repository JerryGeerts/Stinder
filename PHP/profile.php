<link rel="stylesheet" type="text/css" href="../CSS/profile.css">
<script>
	function send(){
		$.ajax({                                      
			url: '../INCLUDES/profile/send.php',                  
			data: "studyName=" + document.getElementById("study").value + "&desc=" + document.getElementById("description").value + "&amount=" + document.getElementById("amount").value,             
			success: function(data) {
				window.alert(data);
			}
		}); 
	}
</script>
<?php 
    INCLUDE "../INCLUDES/header.php"; 
	
	if(!isset($_SESSION["id"])) {
        header("location: index.php");
    }
	if(isset($_GET['si'])){
		$result = $conn->query("select * from students where studentId = ".$_GET['si'].";");
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo $row[email]."<br>".$row[firstName]." ".$row[lastName]."<br>".$row[city]."<br>".$row[street]."<br>".$row[postal]."<br>".$row[telephone];
			}
		} 
		else {
			echo "We could not find what you where looking for try again later!";
		}
	}
	elseif(isset($_GET['ci'])){
		$result = $conn->query("select * from companies join Matches join internships where companies.companyId = ".$_GET['ci']." and Matches.internId = internships.internId and companies.companyId = internships.companyId");
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				echo $row[companyName]."<br>".$row[email]."<br>".$row[firstName]." ".$row[lastName]."<br>".$row[city]."<br>".$row[street]."<br>".$row[postal]."<br>".$row[telephone];
			}
		}
		else {
			echo "We could not find what you where looking for try again later!";
		}
	}
	else{
		if($_SESSION['type'] == "student"){
			$result = $conn->query("select * from students where studentId = ".$_SESSION['id'].";");
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<img src='../AVATAR/".$row[avatar]."'>".$row[email]."<br>".$row[firstName]." ".$row[lastName]."<br>".$row[city]."<br>".$row[street]."<br>".$row[postal]."<br>".$row[telephone];
				}
			} 
			else {
				echo "We could not find what you where looking for try again later!";
			}
		}
		elseif($_SESSION['type'] == "company"){
			$result = $conn->query("select * from companies where companyId = ".$_SESSION['id'].";");
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo $row[companyName]."<br>".$row[email]."<br>".$row[firstName]." ".$row[lastName]."<br>".$row[city]."<br>".$row[street]."<br>".$row[postal]."<br>".$row[telephone];
				}
			}
			else {
				echo "We could not find what you where looking for try again later!";
			}
			echo "<br><br>Your internships:";

			echo "<table><tr><td>Study name</td><td>Description</td><td>AMount</td></tr>";
			$result = $conn->query("select * from internships where internships.companyId = ".$_SESSION['id'].";");
			if ($result->num_rows > 0) {
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>".$row[studyName]."</td><td>".$row[description]."</td><td>".$row[amount]."</td></tr>";
				}
				echo "<tr><td><input type='text'= id='study' placeholder='Study name'></td><td><input placeholder='Description' type='text' id='description'></td><td><input id='amount' type='text'></td></tr>";
				echo "</table>";
				echo "<button onclick='send()'>Send</button>";
			}
			else {
				echo "We could not find what you where looking for try again later!";
			}

		}
		else {
			echo "We could not find what you where looking for try again later!";
		}
	}
?>


<?php 
	INCLUDE "../INCLUDES/footer.php";
?>

