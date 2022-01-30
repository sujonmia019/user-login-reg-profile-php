<?php
	session_start();
	if (!isset($_SESSION['name'])) {
		header('location:index.php');
	}
?>      
   
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="assets/fonts/font-awesome/css/all.css">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

	
	<div class="card w-25 mx-auto mt-5 profile">
		<div class="card-body">
			<img class="shadow-lg" src="photos/<?php echo $_SESSION['photo']; ?>" alt="">
			<h2><?php echo $_SESSION['name']; ?></h2>
			<h3><?php echo $_SESSION['email']; ?></h3>
			<h3><?php echo $_SESSION['username']; ?></h3>
			
		</div>
		<div class="card-footer">
			<a href="logout.php">Log Out</a>
		</div>
	</div>
	


	<script src="assets/js/jquery-3.4.1.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script>
		
		(function($){
			$(document).ready(function(){




			});
		})(jQuery)	
	
	</script>
</body>
</html>