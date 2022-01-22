<?php
	require_once('libs/database.php');
	session_start();
	if (isset($_SESSION['name'])) {
		header('location:profile.php');
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sign Up</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
	<?php
		if (isset($_POST['submit'])) {
			// get form data 
			$name       = $_POST['name'];
			$username   = $_POST['username'];
			$email      = $_POST['email'];
			$password   = $_POST['password'];
			$photo      = $_FILES['photo']['name'];
			$tmp_name   = $_FILES['photo']['tmp_name'];
			$photo_name = rand().time().$photo;

			// validate form 
			if (empty($name) || empty($username) || empty($email) || empty($password) || empty($photo)) {
				echo 'All field is required.';
			}
			else{
				// sql insert 
				$sql = "INSERT INTO students (fname,username,email,pass,photo) VALUES ('$name','$username','$email','$password','$photo_name')";
				$data = $conn->query($sql);
				
				move_uploaded_file($tmp_name,'photos/'.$photo_name);
				echo "Registation Successfully.";
				
			}
		}

	?>


	<div class="log w-50 mx-auto mt-2 shadow">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">Sign Up</h2>
			</div>
			<div class="card-body">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
					<div class="mb-3">
						<label for="" class="form-label">Name</label>
						<input name="name" class="form-control" type="text">
					</div>
					<div class="mb-3">
						<label for="" class="form-label">User Name</label>
						<input name="username" class="form-control" type="text">
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Email</label>
						<input name="email" class="form-control" type="email">
					</div>
					<div class="mb-3">
						<label for="" class="form-label">password</label>
						<input name="password" class="form-control" type="password">
					</div>
					<div class="mb-3">
						<label for="" class="form-label">Profile Pic</label>
						<input name="photo" class="form-control" type="file">
					</div>
					<div class="">
						<input name="submit" class="btn btn-success" type="submit" value="Sign Up">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<a href="index.php">Sign In now</a>
			</div>
		</div>
	</div>
	


</body>
</html>