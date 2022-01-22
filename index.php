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
	<title>Sign In</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	<?php  
		if (isset($_POST['submit'])) {
			$userEmail = $_POST['username_email'];
			$password = $_POST['password'];
			if (empty($userEmail) || empty($password)) {
				echo 'The field is required.';
			}
			else{
				$sql = "SELECT * FROM students WHERE username = '$userEmail' AND pass ='$password' OR email = '$userEmail' AND pass='$password'";
				$data = $conn->query($sql);

				if($data->num_rows === 1){
					$studentData = $data->fetch_assoc();
					$_SESSION['name']      = $studentData['fname'];
					$_SESSION['username']  = $studentData['username'];
					$_SESSION['email']     = $studentData['email'];
					$_SESSION['photo']     = $studentData['photo'];
					header('location:profile.php');
				}
				else{
					echo 'username or password is wrong.';
				}
			}
		}
	?>

	<div class="log w-50 mx-auto mt-2 shadow-sm">
		<div class="card">
			<div class="card-header">
				<h2 class="card-title">Sign In</h2>
			</div>
			<div class="card-body">
				<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">

					<div class="mb-3">
						<label for="" class="form-label">User Name / Email</label>
						<input name="username_email" class="form-control" type="text">
					</div>

					<div class="mb-3">
						<label for="" class="form-label">password</label>
						<input name="password" class="form-control" type="password">
					</div>

					<div class="form-group">
						<input name="submit" class="btn btn-success" type="submit" value="Sign In">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<a href="reg.php">Create an account</a>
			</div>
		</div>
	</div>
	
</body>
</html>