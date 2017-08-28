<link rel="stylesheet" href="../CSS/main.css">


<?php 
    INCLUDE "../INCLUDES/header.php"; 	
    echo "<div id='container'>";
    
	if($_SESSION['type'] == "student"){
    	$result = $conn->query("SELECT companies.*, internships.* FROM internships INNER JOIN studies on studies.studyName = internships.studyName inner join companies on companies.companyId = internships.companyId inner join students on students.studyId = studies.studyId left join Matches on students.studentId = Matches.studentId and internships.internId = Matches.internId where students.studentId = ".$_SESSION['id']." and Matches.status is null LIMIT 1");
	   	if ($result->num_rows > 0) {
        	while($row = $result->fetch_assoc()) {
				$id = $row[internId];
				$cid = $row[companyId];
				$img = $row[avatar];
            	echo "<a id='a' href='profile.php?ci=".$row[companyId]."'><p id='name'>".$row[companyName]."</p></a>";
            }
        }
		else{
			echo "<a><p style='padding-top:230px;'>No Matches Left</p></a>";
			echo "<style>#avatar{display:none;} button{display:none !important;}#question{display:none;}</style>";
		}
    }
	elseif($_SESSION['type'] == "company"){
		$result = $conn->query("SELECT * FROM internships INNER JOIN studies on studies.studyName = internships.studyName inner join companies on companies.companyId = internships.companyId inner join students on students.studyId = studies.studyId left join Matches on students.studentId = Matches.studentId and internships.internId = Matches.internId where companies.companyId = ".$_SESSION['id']." and Matches.status = 1 LIMIT 1");
		if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				$id = $row[matchId];
				$sid = $row[studentId];
				$img = $row[avatar];
				echo "<a id='a' href='profile.php?si=".$row[studentId]."'><p id='name'>".$row[firstName]." ".$row[lastName]."</p></a>";
			}
		}
		else{
			echo "<a><p id='none'>No Matches Left</p></a>";
			echo "<style>#avatar{display:none;} button{display:none !important;}#question{display:none;}#none{padding-top:230px;}</style>";
		}
	}
?>
<div id="avatar">
	<div>
		<br>
		<br>
		<br>
		<p id="info">
		<?php  
			if($_SESSION['type'] == "student"){
				$result = $conn->query("select * from companies where companyId = ".$cid.";");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo $row[companyName]."<br>".$row[email]."<br>".$row[firstName]." ".$row[lastName]."<br>".$row[city]."<br>".$row[street]."<br>".$row[postal]."<br>".$row[telephone];
					}
				}
				else {
					echo "We could not find what you where looking for try again later!";
				}
			}
			elseif($_SESSION['type'] == "company"){
				$result = $conn->query("select * from students where studentId = ".$sid.";");
				if ($result->num_rows > 0) {
					while($row = $result->fetch_assoc()) {
						echo $row[email]."<br>".$row[firstName]." ".$row[lastName]."<br>".$row[city]."<br>".$row[street]."<br>".$row[postal]."<br>".$row[telephone];
					}
				} 
				else {
					echo "We could not find what you where looking for try again later!";
				}
			}
		?>
		</p></div>
	<img id="img" src="../AVATAR/<?php echo $img?>">
</div>
<script>
    function yes(){
		if(typeof $id !== "undefined"){
			$.ajax({                                      
				url: '../INCLUDES/matching/yes.php',                  
				data: "id=" + $id,             
				success: function(data) {
					var array = data.split(";");
					document.getElementById("a").href = array[0];
					document.getElementById("name").innerHTML = array[1];
					$id = array[2];
					document.getElementById("info").innerHTML = array[3];
					document.getElementById("img").src = "../AVATAR/" + array[4];
					if(array[0] == ""){
						document.getElementById("avatar").style = "display:none;";
						document.getElementById("question").style = "display:none;";
						document.getElementById("yes").style = "display:none;";
						document.getElementById("no").style = "display:none;";
						document.getElementById("name").style = "padding-top:230px;";
					}
				}
			}); 
		} 
		else{
			$.ajax({                                      
				url: '../INCLUDES/matching/yes.php',                  
				data: "<?php echo 'id='.$id?>",             
				success: function(data) {
					var array = data.split(";");
					document.getElementById("a").href = array[0];
					document.getElementById("name").innerHTML= array[1];
					$id = array[2];
					document.getElementById("info").innerHTML = array[3]; 
					document.getElementById("img").src = "../AVATAR/" + array[4];
					if(array[0] == ""){
						document.getElementById("avatar").style = "display:none;";
						document.getElementById("question").style = "display:none;";
						document.getElementById("yes").style = "display:none;";
						document.getElementById("no").style = "display:none;";
						document.getElementById("name").style = "padding-top:230px;";
					}
				}
			});
		}
    }

    function no(){
		if(typeof $id !== "undefined"){
			$.ajax({                                      
				url: '../INCLUDES/matching/no.php',                  
				data: "id=" + $id,             
				success: function(data) {
					var array = data.split(";");
					document.getElementById("a").href = array[0];
					document.getElementById("name").innerHTML = array[1];
					$id = array[2];
					document.getElementById("info").innerHTML = array[3]; 
					document.getElementById("img").src = "../AVATAR/" + array[4];
					if(array[0] == ""){
						document.getElementById("avatar").style = "display:none;";
						document.getElementById("question").style = "display:none;";
						document.getElementById("yes").style = "display:none;";
						document.getElementById("no").style = "display:none;";
						document.getElementById("name").style = "padding-top:230px;";
					}
				}
			}); 
		} 
		else{
			$.ajax({                                      
				url: '../INCLUDES/matching/no.php',                  
				data: "<?php echo 'id='.$id?>",             
				success: function(data) {
					var array = data.split(";");
					document.getElementById("a").href = array[0];
					document.getElementById("name").innerHTML = array[1];
					$id = array[2];
					document.getElementById("info").innerHTML = array[3];
					document.getElementById("img").src = "../AVATAR/" + array[4];
					if(array[0] == ""){
						document.getElementById("avatar").style = "display:none;";
						document.getElementById("question").style = "display:none;";
						document.getElementById("yes").style = "display:none;";
						document.getElementById("no").style = "display:none;";
						document.getElementById("name").style = "padding-top:230px;";
					}
				}
			});
		}
    }
</script>
<?php include '../INCLUDES/file.php'; ?>
	<?php 
		if($_SESSION['type'] == "student"){ echo "<p id='question'>Do you like this company?</p>"; }
		elseif($_SESSION['type'] == "company"){ echo "<p id='question'>Do you like this intern?</p>"; }
	?>
	<div>
		<button id="yes" onclick="yes()">Yes</button>
		<button id="no" onclick="no()">No</button>
	</div>
</div>
<?php 
	INCLUDE "../INCLUDES/footer.php";
?>