<link rel="stylesheet" type="text/css" href="../CSS/chat.css">
<?php 
    INCLUDE "../INCLUDES/header.php"; 
	if(!isset($_SESSION["id"])) {
        header("location: index.php");
    }
    if(isset($_GET['ci'])){
        $result = $conn->query("select * from Matches join internships where Matches.studentId = ".$_SESSION['id']." and internships.internId = Matches.internId and internships.companyId = ".$_GET['ci'].";");
        if ($result->num_rows > 0) {
            $result = $conn->query("select * from companies where companyId = ".$_GET['ci'].";");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div id='name'><a href='profile.php?ci=".$row[companyId]."'><img src='../AVATAR/".$row[avatar]."'><p>".$row[companyName]."</p></a></div> ".$row[description]."<br>";
                }
            } 
            else {
                echo "We could not find what you where looking for try again later!";
            }
        }
        else{
            echo "You dont have a match with this person!";
        }
    }
    elseif(isset($_GET['si'])){
        $result = $conn->query("select * from Matches join internships where Matches.studentId = ".$_GET['si']." and internships.internId = Matches.internId and internships.companyId = ".$_SESSION['id'].";");
        if ($result->num_rows > 0) {
            $result = $conn->query("select * from students where studentId = ".$_GET['si'].";");
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<div id='name'><a href='profile.php?si=".$row[studentId]."'><p><img src='../AVATAR/".$row[avatar]."'>".$row[firstName]." ".$row[lastName]."</p></a></div><br>";
                }
            } 
            else {
                echo "We could not find what you where looking for try again later!";
            }
        }
        else{
            echo "You dont have a match with this person!";
        }
    }
    ?>
    <div id="container">
        <div id="chat" style="width:50%;display:block;margin:auto;">
        <script>
            function send(){
                if(document.getElementById('msg').value != ""){
                    $.ajax({                                      
                        url: '../INCLUDES/chat/send.php',                  
                        data: "<?php if($_SESSION['type'] == 'student'){echo 'id='.$_GET['ci'];}elseif($_SESSION['type'] == 'company'){echo 'id='.$_GET['si'];}?>" + "&msg=" + document.getElementById('msg').value,             
                    });
                    document.getElementById('msg').value = "";
                }

                $("#chat").animate({ scrollTop: 10000000000 }, "slow");
                
            }
        </script>
        </div>
        <div id="type">
            <input type="text" id="msg" placeholder="Type message here">
            <button id="send" onclick="send()">Send</button>
        </div>
    </div>

<?php 
	INCLUDE "../INCLUDES/footer.php";
?>
<script>
    getResult();
    var oldD;
    jQuery().ready(function(){
        setInterval("getResult()",1000);
    });
    function getResult(){   
        jQuery.post("../INCLUDES/chat/update.php?<?php if($_SESSION['type'] == 'student'){echo 'ci='.$_GET['ci'];}elseif($_SESSION['type'] == 'company'){echo 'si='.$_GET['si'];}?>",function( data ) {
            if(oldD != data){
                jQuery("#chat").html(data);
                oldD = data;
                $("#chat").animate({ scrollTop: 10000000000 }, "slow");
            }
        });
         
    };

    $("#msg").keyup(function(event){
        if(event.keyCode == 13){
            $("#send").click();
        }
    });

                    
</script>