<?php
include 'connect.php';
if(isset($_POST['sub']))
{
	$name=$_POST['nm'];
	$email=$_POST['em'];
	$pass=password_hash($_POST['pass'],PASSWORD_BCRYPT);
	$rpass=password_hash($_POST['rpass'],PASSWORD_BCRYPT);

	$emailquery="select * from signup where email='$email'";
	$query=mysqli_query($con,$emailquery);

	$ecount=mysqli_num_rows($query);

	if($ecount>0)
	{
		echo "Email already exist";
	}
	else
	{
    	if($_POST['pass'] === $_POST['rpass'])
    	{
			$iq="insert into signup(name,email,password,repassword) values('$name','$email','$pass','$rpass')";
			$res=mysqli_query($con,$iq);
			if($res)
			{
?>
    		 	<script>
     			alert("Data inserted Properly");
     			</script>
<?php
	 		}
	 		else
	 		{
?>
	 			<script>
	 			alert("Insertion Failed");
	 			</script>
<?php
	 		}
	 	}
	 	else
	 	{
	 		echo "Password doesnot match";
	 	}


	}
}
?>
<! Doctype html>
<html>
<head>
<link rel="stylesheet" href="signup.css">
<title>Sign up</title>
</head>
<body>
	<div id="help" >
	<button type="button">Help<a href=" "></a></button>
	</div>
	<div  class="signup">
	<h1>SIGNUP</h1>
	<form action="" method="POST">
		<div class="tb">
		<i class="fa fa-user" aria-hidden="true"></i>
		<input type="text" placeholder="Fullname" name="nm">
	    </div>
	    <div class="tb">
		<i class="fa fa-envelope" aria-hidden="true"></i>
		<input type="text" placeholder="email" name="em">
	    </div>
	    <div class="tb">
		<i class="fa fa-lock" aria-hidden="true"></i>
		<input type='password' placeholder="Password" name="pass">
	    </div>
	    <div class="tb">
	    <i class="fa fa-lock" aria-hidden="true"></i>
		<input type="Password" placeholder="Re-enter Password" name="rpass">
	    </div>
	    <div class="btn">
	    <input type="submit" name="sub" class="btn" value="Signup">
		</div>
	</form>
	</div>
	
	

</body>
</html>