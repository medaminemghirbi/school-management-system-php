<?php
   if(!isset($_SERVER['HTTP_REFERER'])){
       // redirect them to your desired location
       header('location:../index.php');
       exit;
   } 
   ?>
<?php include_once('head.php'); ?>
<?php include_once('header_teacher.php'); ?>
<?php include_once('sidebar2.php'); ?>
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
   background-color:#979045 ;
   padding:0;
   }
   .cal-number-td{
   border:1px solid white;
   width:70px;
   background-color:#677be2;
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
   <h5><?php echo $name; ?>,<strong><span style="color:#cf4ed4;"> Welcome back! </span></strong></h5><br>
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
      
      $sql="SELECT * FROM teacher WHERE index_number='$my_index'";
      $result=mysqli_query($conn,$sql);
      $row=mysqli_fetch_assoc($result);
      $name=$row['i_name'];
      $id=$row['id'];
      
      ?>    
   <!-- Main content -->
   <section class="content">
   <!-- Info boxes -->
   <div class="row">
      <div class="col-md-3 col-sm-6 col-xs-12">
         <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-gear-outline"></i></span>
            <div class="info-box-content">
               <span class="info-box-text">My STUDENT</span>
               <?php
                  include_once('../controller/config.php');
                  
                  $sql1="SELECT * FROM subject_routing WHERE teacher_id='$id'";
                  $total_count2=0;
                  $my_student=0;
                  $current_year=date("Y");
                  
                  $result1=mysqli_query($conn,$sql1);
                  while($row1=mysqli_fetch_assoc($result1)){
                  	$sr_id=$row1['id'];
                  	
                  	$sql2="SELECT count(id) FROM student_subject WHERE sr_id='$sr_id' AND year='$current_year' AND _status=''";
                  	
                  	$result2=mysqli_query($conn,$sql2);
                  	$row2=mysqli_fetch_assoc($result2);
                  	$total_count2=$row2['count(id)'];
                  	$my_student+=$total_count2;
                  
                  }
                  
                  ?>   
               <span class="info-box-number"><?php echo $my_student; ?></span>
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
               <span class="info-box-text">All Student</span>
               <?php
                  include_once('../controller/config.php');
                  
                  $sql1="SELECT count(id) FROM student WHERE _status=''";
                  $all_student=0;
                  
                  $result1=mysqli_query($conn,$sql1);
                  $row1=mysqli_fetch_assoc($result1);
                  $all_student=$row1['count(id)'];
                  
                  ?>             
               <span class="info-box-number"><?php echo $all_student; ?></span>
            </div>
            <!-- /.info-box-content -->
         </div>
         <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- fix for small devices only -->
      <div class="clearfix visible-sm-block"></div>


      <!-- /.col -->
   </div>
   <!-- /.row -->


   <div id="cEvent">
   </div>
   <script>
      var m2 = 0;
      
      function ShowEvents(status,my_index,my_type){
      	
      	var d = new Date();    //new Date('2017','08','25');
      	var month_name = ['January','February','March','April','May','June','July','August','September','Octomber','November','December'];	
      		
      	var m1 = d.getMonth(); //0-11
      	var y1 = d.getFullYear(); //2017
      		
      	if(status == 'K'){
      		var m3 = m1;
      	}
      		
      	if(status == 'N'){
      		m2++;
      		var m3 = m1 + m2;
      	}
      				
      	if(status == 'P'){
      		m2--;
      		var m3 = m1 + m2;
      	}
      				
      	if(m3 == 0){
      		$('#btn1').css('pointer-events', 'none');
      	}
      				
      	if(m3 == 11){
      		$('#btn2').css('pointer-events', 'none');
      	}
      	
      	var current_date = d.getDate();
      		
      	var xhttp = new XMLHttpRequest();//MSK-00105-Ajax Start  
      		xhttp.onreadystatechange = function() {
      				
      			if (this.readyState == 4 && this.status == 200){
      					//MSK-00107 
      				document.getElementById('row').innerHTML = this.responseText;//MSK-000132
      				
      				var start_date = $('#start_date').val().split(',');
      				var end_date = $('#end_date').val().split(',');
      				var color = $('#color').val().split(',');
      				var event_id = $('#event_id').val().split(',');
      			
      				var month = m3; //0-11
      				var year = y1; //2017 
      				var first_date = month_name[month] + " " + 1 + " " + year;
      				
      				var tmp = new Date(first_date).toDateString();
      				// Tue Aug 01 2017...
      				
      				var first_day = tmp.substring(0,3); //Thu
      				var day_name = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
      				var day_no = day_name.indexOf(first_day);  //4
      				var days = new Date(year, month+1, 0).getDate(); //31
      				// Thu Aug 31 2017...
      				
      				var calendar = get_calendar(day_no,days);
      				
      				document.getElementById("calendar_month_year").innerHTML = month_name[month];
      				document.getElementById("calendar_dates").appendChild(calendar);
      				$("#td_"+current_date).css("background-color", "#319a5b");
      				 
      				var count1 = start_date.length;
      				var k=0;
      				for(var i=0; i<count1; i++){
      					var s_date = parseInt(start_date[i], 10);
      					var e_date = parseInt(end_date[i], 10);
      					
      					var count = e_date - s_date;
      				
      					for(var j=0; j<=count; j++){
      					
      						k = s_date+j;
      						
      						$("#td_"+k).append('<div class="div-event-c" style="background-color:'+color[i]+'"><a id="event_"+'+[i]+' style="color:white;" href="#" onclick="showEvent('+event_id[i]+')"><i class="fa fa-calendar" aria-hidden="true"></i></a></div>');
      													
      					}
      					
      					
      				}
      
      			}
      				
      		};	
      		xhttp.open("GET", "all_events1.php?year=" + y1 + "&month="+m3 + "&my_type="+my_type + "&my_index="+my_index , true);	
      		xhttp.send();//MSK-00105-Ajax End
      		
      };
      
   </script>
   <div id="showEvent">
   </div>
   <script>
      function showEvent(event_id){
      	
      	var xhttp = new XMLHttpRequest();//MSK-00105-Ajax Start  
      		xhttp.onreadystatechange = function() {
      				
      			if (this.readyState == 4 && this.status == 200) {
      				document.getElementById('showEvent').innerHTML = this.responseText;//MSK-000132
      				$('#modalviewEvent').modal('show');
      			}
      				
      		};	
      		
      		xhttp.open("GET", "show_events1.php?event_id="+event_id , true);												
      		xhttp.send();//MSK-00105-Ajax End
      };
      
      function get_calendar(day_no,days){
      	
      	var table = document.createElement('table');
      	var tr = document.createElement('tr');
      	
      	table.className = 'cal-table';
      	
      	// row for the day letters
      	for(var c=0; c<=6; c++){
      		var th = document.createElement('th');
      		th.innerHTML =  ['S','M','T','W','T','F','S'][c];
      		tr.appendChild(th);
      		th.className = "tHead";
      		
      		
      	}
      	
      	table.appendChild(tr);
      	
      	//create 2nd row
      	
      	tr = document.createElement('tr');
      	
      	var c;
      	for(c=0; c<=6; c++){
      		
      		if(c== day_no){
      			break;
      		}
      		var td = document.createElement('td');
      		td.innerHTML = "";
      		tr.appendChild(td);
      		td.className = "td_no_number";
      		tr.className = 'cal-tr';
      	}
      	
      	var count = 1;
      	for(; c<=6; c++){
      		var td = document.createElement('td');
      		td.id = "td_"+count;
      		td.className = 'cal-number-td';
      		tr.appendChild(td);
      		tr.className = 'cal-tr';
      		
      		var h5 = document.createElement('h5');
      		h5.className = 'h5';
      		td.appendChild(h5);
      		h5.innerHTML = count;
      		count++;
      		
      		
      	}
      	table.appendChild(tr);
      	
      	//rest of the date rows
      	
      	for(var r=3; r<=7; r++){
      		tr = document.createElement('tr');
      		for(var c=0; c<=6; c++){
      			
      			if(count > days){
      				for(; c<=6; c++){
      		
      					var td = document.createElement('td');
      					td.innerHTML = "";
      					tr.appendChild(td);
      					td.className = "td_no_number";
      					tr.className = 'cal-tr';
      				}
      				table.appendChild(tr);
      				return table;
      			}
      			
      			var td = document.createElement('td');
      			//td.innerHTML = count;
      			td.id = "td_"+count;
      			//td.style.padding = 0;
      			td.className = 'cal-number-td';
      			
      			tr.appendChild(td);
      			
      			var h5 = document.createElement('h5');
      			h5.className = 'h5';
      			td.appendChild(h5);
      			h5.innerHTML = count;
      			count++;
      			tr.className = 'cal-tr';
      			
      		}
      		table.appendChild(tr);
      		
      	}
      	
      };	
   </script>
   <?php 
      $my_index=$_SESSION['index_number'];
      $my_type=$_SESSION['type'];
      
      echo '<script>','ShowEvents("K",'.$my_index.',"'.$my_type.'");','</script>';
      
      ?>         
 
   <?php
      include_once('../controller/config.php');
      $current_year=date("Y");
      $prefix="";
      $prefix1="";
      $monthly_std_reg="";
      $sr_id1="";
      $count5;
      
      for($j=0; $j<12; $j++){
      	$count5[$j]=0;
      }
      
      $month=array("January","February","March","April","May","June","July","August","September","October","November","December");
      
      $sql1="SELECT * FROM subject_routing WHERE teacher_id='$id'";
      $result1=mysqli_query($conn,$sql1);
      while($row1=mysqli_fetch_assoc($result1)){
      	
      	$sr_id=$row1['id'];
      	
      	for($i=0; $i<count($month); $i++){
      		
      		$sql="SELECT COUNT(id) FROM student_subject WHERE year='$current_year' AND reg_month='$month[$i]' AND _status='' AND sr_id='$sr_id'";
      		$result=mysqli_query($conn,$sql);
      		$row=mysqli_fetch_assoc($result);
      		$a=$row['COUNT(id)'];
      		$a=$a*1;
      		$count5[$i]+=$a;
      	
      	}
      	
      }
       
      	for($k=0; $k<count($month); $k++){
      		
      		$monthly_std_reg.=$prefix.'"'. $count5[$k].'"'; 
      		$prefix=',';
      		
      	}
      
      echo "<script>showLineChart('$monthly_std_reg');</script>";
      
      ?>
   <!--redirect your own url when clicking browser back button -->
   <script>
      (function(window, location) {
      history.replaceState(null, document.title, location.pathname+"#!/history");
      history.pushState(null, document.title, location.pathname);
      
      window.addEventListener("popstate", function() {
        if(location.hash === "#!/history") {
          history.replaceState(null, document.title, location.pathname);
          setTimeout(function(){
            location.replace("../index.php");//path to when click back button
          },0);
        }
      }, false);
      }(window, location));
   </script>
</div>
<!-- /.content-wrapper -->  
<?php include_once('footer.php'); ?>