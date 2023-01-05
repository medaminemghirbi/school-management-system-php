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

<style>

.msk-fade {  
      
    -webkit-animation-name: animatetop;
    -webkit-animation-duration: 0.4s;
    animation-name: animatetop;
    animation-duration: 0.4s

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

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
    <section class="content-header">
    	<h1>
        	Teacher
        	<small>Preview</small>
        </h1>
        <ol class="breadcrumb">
        	<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Teacher</a></li>
            <li><a href="#">My Teacher</a></li>
    	</ol>
	</section>
    
    <!-- table for view all records //MSK-00112 -->
    <section class="content" > <!-- Main content -->
        <div class="row" id="table1">
            <div class="col-md-7">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">My Teacher</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <th class="col-md-1">ID</th>
                                <th class="col-md-2">Name</th>
                                <th class="col-md-2">Action</th>
                            </thead>
                            <tbody>
<?php
include_once('../controller/config.php');
$index=$_SESSION["index_number"];
$sql="select DISTINCT teacher.i_name as t_name,teacher.index_number as t_index 
      from student_subject
	  inner join subject_routing
	  on student_subject.sr_id=subject_routing.id
	  inner join teacher
	  on subject_routing.teacher_id=teacher.id
	  where student_subject.index_number='$index'";
$result=mysqli_query($conn,$sql);
$count = 0;
if(mysqli_num_rows($result) > 0){
	while($row=mysqli_fetch_assoc($result)){
    	$count++;
?>   
                                <tr>
                                    <td><?php echo $count; ?></td>
                                    <td id="td1_<?php echo $row['id']; ?>"><?php echo $row['t_name']; ?></td>
                                    <td>
<!--MSK-00146 --> 
<a href="#" onClick="showTeacher(this)" class="btn btn-primary btn-xs"  data-id="<?php echo $row["t_index"]; ?>">View Profile</a>
<a href="#" onClick="showModal1(this)" class="btn btn-success btn-xs"  data-id="<?php echo $row["t_index"]; ?>" >Somthing</a>
                                    </td>
                                    
                                </tr>
<?php } } ?>
                            </tbody>
                        </table>
                	</div><!-- /.box-body -->	
                </div>
            </div>
        </div>
    </section> <!-- End of table section --> 

   	<div class="row" id="tProfile">
        
     </div>
    
    
<script>
//MSK-00147
function showTeacher(viewForm){
	var index = $(viewForm).data("id"); 
	
	var xhttp = new XMLHttpRequest();//MSK-00149-Start Ajax  
  		xhttp.onreadystatechange = function() {
    		if (this.readyState == 4 && this.status == 200) {
				document.getElementById('tProfile').innerHTML = this.responseText;
				$('#modalviewTeacher').modal('show');
    		}
			
  		};	
		
    xhttp.open("GET", "teacher_profile1.php?index_number=" + index , true);												
  	xhttp.send();//MSK-00149--End Ajax
	 
};
  
</script>

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

</div><!-- /.content-wrapper -->  
            
<?php include_once('footer.php');?>