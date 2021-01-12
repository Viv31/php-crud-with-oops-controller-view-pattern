<?php include('header.php');?>
<div class="row">
	<div class="col-md-6 mx-auto" id="error_div">
	<div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Error!</strong> Please fill all fields.
</div>
</div>
</div>
<div class="row">
	
	<div class="col-md-6 mx-auto" id="form_div">
		<form action="insert_data.php" method="POST">
		<div class="form-group">
			<label>Full Name:</label>
			<input type="text" name="full_name" id="full_name" placeholder="Enter Full Name" class="form-control">
		</div>
		<div class="form-group">
			<label>Mobile No:</label>
			<input type="text" name="mobile_no" id="mobile_no" placeholder="Enter Mobile No" class="form-control">
		</div>
		<div class="form-group">
			<label>Course:</label>
			<input type="text" name="course" id="course" placeholder="Enter Course" class="form-control">
		</div>
		<input type="submit" name="submit" id="insert" value="Insert" class="btn btn-dark">
		</form>
	</div>
</div>
<?php include('footer.php'); ?>
<script type="text/javascript">
	$(document).ready(function(){
		$("#error_div").hide();

		$("#insert").click(function(){
			var full_name = $("#full_name").val();
			var mobile_no = $("#mobile_no").val();
			var course = $("#course").val();

			if(full_name == '' || mobile_no == "" || course == ""){
				$("#error_div").show();
				return false;

			}

		});
	});
</script>