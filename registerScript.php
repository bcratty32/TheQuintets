<html>
	<head>

		<title>
		 Connecting to the MySQL Server Using PHP
		</title>
	</head>

	<body>
	<?php

	//Address error handling
	ini_set('display_errors', 1);
	//error_reporting(E_ALL & E_NOTICE);

	//Attempt to connect

	if($connection=@mysql_connect('localhost', 'tshay1', 'DHS23Hornets')){
	   //print '<p>Successfully connected to MySQL.</p>';
	}else{

		die('<p>Could not connect to MySQL because:<b>'.mysql_error().'</b></p>');
	}
	if(@mysql_select_db("tshay1DB", $connection)){
		//print '<p> The tshay1DB database has been selected</p>';
	}else{
		die('<p>Could not select the tshay1DB database because:<b>'.mysql_error().'</b></p>');
	}

	$email=$_POST['email'];
	$username=$_POST['username'];
	$schoolName=$_POST['schoolName'];
	$schoolCity=$_POST['schoolCity'];
	$schoolState=$_POST['schoolState'];
	$password=$_POST['password'];
	$confirmedPass=$_POST['confirm'];

	//searching to see if school already in schools table
	$checkSchool="SELECT name FROM schools WHERE name='$schoolName'";
	if($r=mysql_query($checkSchool))
	{
		$row=mysql_fetch_array($r);
		if($row=="")
		{
			$insertSchool="INSERT INTO `schools`(`name`, `city`, `state`) VALUES ('$schoolName','$schoolCity','$schoolState')";
			if($r=mysql_query($insertSchool))
			{
				echo "Entered into Schools!";
			}
			else
			{
				echo "Problem!";
			}
		}
		else
		{
			echo "School already in schools table!";
		}
	}


	//checking if email is already used
	$checkEmailAlreadyUsed="SELECT email FROM users WHERE email='$email'";
	if($r=mysql_query($checkEmailAlreadyUsed))
	{
		$row=mysql_fetch_array($r);
		//if email does not exist
		if($row=="")
		{
			$checkUsername="SELECT username FROM users WHERE username='$username'";
			if($r=mysql_query($checkUsername))
			{
				$row=mysql_fetch_array($r);
				//if email does not exist
				if($row=="")
				{
					if($password==$confirmedPass)
					{
						//inserting student into database when registering
						$query="INSERT INTO users(email, username, password, schoolName) VALUES ('$email','$username','$password', '$schoolName')";
						if($r=mysql_query($query))
						{
							echo 'successfully registered!';
						}
					}
					else
					{
						echo "password does not match!";
					}
				}
				else
				{
					echo "That username already exists!";
				}
			}

		}
		//email already exists
		else
		{
			echo "That email is already used!";
		}
	}
	echo '<br/><a href="index.php">Go back</a>';

	?>
	</body>
</html>
