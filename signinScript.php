
	<?php
	session_start();

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

	$email=$_POST['inputEmail'];
	$password=$_POST['inputPassword'];


	$query="SELECT password, username, id FROM users WHERE email='$email'";
	if($r=mysql_query($query))
	{
		//echo "success";
		$row=mysql_fetch_array($r);
		$pass_from_db=$row[0];
		$username=$row[1];
		$userID=$row[2];

		//if valid information is entered, login
		if($password==$pass_from_db)
		{
			// echo "Same pass!";
			$_SESSION['loggedin'] = true;
    		$_SESSION['username'] = $username;
    		$_SESSION['userID'] = $userID;
			header("Location: index.php");
		}

		//if email entered is not in database
		else if($row=="")
		{
			echo 'No account exists with that email! <a href="signIn.php"> Go back</a>';
		}

		//if email is valid but wrong password
		else
		{
			echo 'Wrong pass! <a href="signIn.php"> Go back</a>';
		}
	}

	?>
