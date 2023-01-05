<?php
   if(!isset($_SERVER['HTTP_REFERER'])){
       // redirect them to your desired location
       header('location:../index.php');
       exit;
   } 
   ?>
<?php include_once('head.php'); ?>
<?php include_once('header_student.php'); ?>
<?php include_once('sidebar1.php'); ?>
<?php include_once('alert.php'); ?>
<style>
   .form-control-feedback {
   pointer-events: auto;
   }
   .set-width-tooltip + .tooltip > .tooltip-inner { 
   min-width:180px;
   }
   .msk-fade {  
   -webkit-animation-name: animatetop;
   -webkit-animation-duration: 0.5s;
   animation-name: animatetop;
   animation-duration: 0.5s;
   }
   .modal-content1 {
   height: auto;
   min-height: 100%;
   border-radius: 0;
   position: absolute;
   left: 25%; 
   }
   /* Add Animation */
   @-webkit-keyframes animatetop {
   from {top:-300px; opacity:0} 
   to {top:0; opacity:1}
   }
   @keyframes animatetop {
   from {top:-300px; opacity:0}
   to {top:0; opacity:1}
   }
   .cal-table{
   width:100%;
   padding:0;
   margin:0;	
   }
   #calendar_dates{
   padding:10px;
   margin-left:10px;
   width:95%;	
   }
   .tHead{
   height:40px;
   background-color:#8e1c82;
   color:#FFF;
   text-align:center;
   border:1px solid #FFF;
   width:70px;
   }
   .cal-tr{
   height:50px;
   }
   .td_no_number{
   border:1px solid white;
   width:70px;
   background-color:#979045;
   padding:0;
   }
   .cal-number-td{
   border:1px solid white;
   width:70px;
   background-color:#677be2 ;
   color:white;
   }
   .h5{
   color:#FFF;
   display: inline-block;
   background:#636;
   width:15px;
   height:15px;	
   font-size:11px;
   font-weight:bold;
   font-family:Cambria, "Hoefler Text", "Liberation Serif", Times, "Times New Roman", serif;
   text-align:center;
   float:right;
   padding-top:1px;
   margin-bottom:50%;
   }
   .div-event-c{
   margin-top:65%;
   height:17px;
   }
   #cal_month{
   width:20%;
   border-radius:5%;
   padding:0;
   }
   #cal_year{
   width:15%;
   border-radius:5%;
   margin-left:5px;
   padding:0;
   }
   #btnShow{
   margin-left:5px;
   }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
   <h5><?php echo $name; ?>,<strong><span style="color:#cf4ed4;"> Welcome back! </span></strong></h5>
      <h1>
         Dashboard
         <small>Preview</small>
      </h1>
      <ol class="breadcrumb">
         <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
         <li><a href="#">Dashboard</a></li>
      </ol>
   </section>
   <?php
      include_once('../controller/config.php');
      
      $my_index= $_SESSION["index_number"];
      
      $sql="SELECT * FROM student WHERE index_number='$my_index'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $name=$row['i_name'];
      
      ?>    
   <!-- Main content -->
   <section class="content">
   <!-- Info boxes -->
   <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Total Student</span>
               <?php
                  include_once('../controller/config.php');
                  
                  $sql1="SELECT count(id) FROM student WHERE _status=''";
                  $total_count1=0;
                  
                  $result1=mysqli_query($conn,$sql1);
                  $row1=mysqli_fetch_assoc($result1);
                  $total_count1=$row1['count(id)'];
                  
                  ?>               
               <span class="info-box-number"><?php echo $total_count1; ?></span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">Total Teacher</span>
               <?php
                  include_once('../controller/config.php');
                  
                  $sql2="SELECT count(id) FROM teacher";
                  $total_count2=0;
                  
                  $result2=mysqli_query($conn,$sql2);
                  $row2=mysqli_fetch_assoc($result2);
                  $total_count2=$row2['count(id)'];
                  
                  ?> 
               <span class="info-box-number"><?php echo $total_count2; ?></span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>

      <!-- /.col -->

      <!-- /.col -->
   </div>
   <!-- /.row -->
 

 
  
<?php include_once('footer.php'); ?>