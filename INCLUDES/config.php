<?php
  $servername = "localhost";
  $username = "pinejcfs_Stinder";
  $password = "Stinder123";
  $dbname = "pinejcfs_Stinder";

  $dsn = 'mysql:host=localhost;dbname=pinejcfs_Stinder';
  $connPDO = new PDO($dsn, $username, $password);
  $conn = new mysqli($servername, $username, $password, $dbname);
?>