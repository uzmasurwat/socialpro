### create file shared

<?php	
	include_once "autoload.php";
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Add New Student</title>
	<!-- ALL CSS FILES  -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/responsive.css">
</head>
<body>
	
	<?php

	/**
	 * Student form isset
	 */
	
	if (isset($_POST['add_student'])) {

		// get data 
		$name = $_POST['name'];
		$email = $_POST['email'];
		$cell = $_POST['cell'];

		$location = $_POST['location'];
	 	$age = $_POST['age'];

		if (isset($_POST['gender'])) {
			$gender = $_POST['gender'];
		} else {
			$gender = NULL;
		}

		$amount = $_POST['amount'];



		if (empty($name) || empty($email) || empty($cell)) {
			$msg = validate('All fileds are required ');
		} else if (emailCheck($email) == false) {
			$msg = validate('Invalid email address ');
		} else if (cellcheck($cell) == false) {
			$msg = validate('Invalid Cell number');
		} else {

			$file_name = move($_FILES['photo'], 'media/students/');
			create("INSERT INTO students (name, email, cell, photo, location, age, gender, amount) VALUES ('$name','$email','$cell', '$file_name', '$location','$age','$gender','$amount')");
			$msg = validate('Student added successful', 'success');
		}
	}
	
	?>

	<div class="wrap">
	<a class="btn btn-sm btn-primary text-light my-2 text-capitalize font-weight-bold" href="index.php">All Students</a>
		<div class="card shadow">
		
			<div class="card-body">
				<h2>Add New Student</h2>

	 				<?php
					 
					 if(isset($msg)){
						 echo $msg;
					 }
					 
					 ?>

				<form action="" method="POST" enctype="multipart/form-data">

					<div class="form-group">
						<label for="">Name</label>
						<input name="name" class="form-control" value="<?php old('name'); ?>" type="text">
					</div>

					<div class="form-group">
						<label for="">Email</label>
						<input name="email" class="form-control" value="<?php old('email'); ?>" type="text">
					</div>

					<div class="form-group">
						<label for="">Cell</label>
						<input name="cell" class="form-control" value="<?php old('cell'); ?>" type="text">
					</div>

					<div class="form-group">
						<label for="">Location</label>
						<select class="form-control" name="location" id="">
							<option value="">-select-</option>
							<option class=" bg-primary text-light font-weight-bold" value="Mirpur">Mirpur</option>
							<option class=" bg-primary text-light font-weight-bold" value="Gulshan">Gulshan</option>
							<option class=" bg-primary text-light font-weight-bold" value="Uttara">Uttara</option>
							<option class=" bg-primary text-light font-weight-bold" value="Badda">Badda</option>
							<option class=" bg-primary text-light font-weight-bold" value="Dhanmondi">Dhanmondi</option>
							<option class=" bg-primary text-light font-weight-bold" value="Banani">Banani</option>
							<option class=" bg-primary text-light font-weight-bold" value="Mohammadpur">Mohammadpur</option>
							<option class=" bg-primary text-light font-weight-bold" value="Rampura">Rampura</option>
							<option class=" bg-primary text-light font-weight-bold" value="Bashundhara r/a">Bashundhara r/a</option>
						</select>
					</div>

					<div class="form-group">
						<label for="">Age</label>
						<input name="age" class="form-control" value="<?php old('age'); ?>" type="text">
					</div>

					<div class="form-group">
						<label for="">Gender</label>
						<input name="gender" type="radio" value="Male" id="Male"> <label for="Male">Male</label>
						<input name="gender" type="radio" value="Female" id="Female"> <label for="Female">Female</label>
					</div>

					<div class="form-group">
						<label for="">Amount</label>
						<input name="amount" class="form-control" value="<?php old('amount'); ?>" type="text">
					</div>

					<div class="form-group">
						<label for=""><a href="media/students/"><img src="assets/media/im>g/pp_photo/photo-icon.png" widht="50px" height="50px" alt=""></a></label>
						<input name="photo" class="" value="<?php old('photo'); ?>" type="file">
					</div>

					<div class="form-group">
						<input name="add_student" class="btn btn-primary" type="submit" value="Sign Up">
					</div>

				</form>

			</div>
			
		</div>
	</div>

	<br>
	<br>
	<br>
	<br>
	




	<!-- JS FILES  -->
	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/custom.js"></script>
</body>
</html>
</html>