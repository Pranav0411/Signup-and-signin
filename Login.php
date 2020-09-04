<! Doctype html>
<html>
<head>
<link rel="stylesheet" href="Login.css">
<title>Sign in</title>
</head>
<body>
	<?php

	include 'connect.php';

	if(isset($_POST['sub']))
	{
		$email=$_POST['em'];
		$pass=$_POST['pass'];

		$esearch="select * from signup where email='$email'";
		$query=mysqli_query($con,$esearch);

		$ec=mysqli_num_rows($query);

		if($ec)
		{
			$epass=mysqli_fetch_assoc($query);
			$fpass=$epass['password'];
			$dpass=password_verify($pass,$fpass);
			if($dpass)
			{
	?>
				<script>
					alert("Login Successful");
					location.replace("home.php");
				</script>
	<?php
			}
			else
			{
	?>
				<script>
					alert("Password Incorrect");
				</script>
	<?php
			}
		}
		else
		{
			echo "Invalid email";
		}
	}
	?>
	<div id="help" >
	<button type="button">Help<a href=" "></a></button>
	</div>
	<div  class="loginbox">
	<h1>LOGIN</h1>
	<form action="" method="POST">
		<div class="tb">
		<i class="fa fa-user" aria-hidden="true"></i>
		<input type="text" placeholder="Email" name="em">
	    </div>
	    <div class="tb">
	    <i class="fa fa-lock" aria-hidden="true"></i>
		<input type="Password" placeholder="Password" name="pass">
	    </div>
	    <div class="btn">
	    <input type="submit" name="sub" class="btn" value="Log in">
		</div>
	</form>
	</div>
	
	

</body>
</html>