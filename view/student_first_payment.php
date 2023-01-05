<?php
   if(!isset($_SERVER['HTTP_REFERER'])){
       // redirect them to your desired location
       header('location:../index.php');
       exit;
   }
   ?>
<?php
   include_once("../controller/config.php");
   for($i=0;$i<count(json_decode($_GET['id']));$i++){
   
   	$index=$_GET['index'];
   	$id = json_decode($_GET['id'], true);
   	$year=date('Y');
   	
   	$sql = "INSERT INTO student_subject(index_number,sr_id,year)
   			VALUES ('".$index."','".$id[$i]."','".$year."')";
   	mysqli_query($conn,$sql);
   		
   }
   
   ?>
<?php
   include_once("../controller/config.php");
   
   	$index=$_GET['index'];
   	$grade_id=$_GET['grade'];
   	$year=date('Y');
   	
   	$sql = "INSERT INTO student_grade(index_number,grade_id,year)
   			VALUES ('".$index."','".$grade_id."','".$year."')";
   	mysqli_query($conn,$sql);
   		
   ?>
<!--MSK-000136-->

<!--/.modal -->