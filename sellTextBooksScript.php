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

	$author=$_POST['author'];
	$title=$_POST['title'];
	$ISBN=$_POST['isbn'];
	$year=$_POST['year'];
	$edition=$_POST['edition'];
	$condition=$_POST['condition'];
	$price=$_POST['price'];
	if(isset($_SESSION['userID']))
	{
		$id = $_SESSION['userID'];
	}

	if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
	{
		$query="INSERT INTO `books`(`Author`, `Title`, `ISBN`, `Year`, `Edition`) VALUES ('$author','$title','$ISBN', '$year', '$edition')";
		if($r=mysql_query($query))
		{
			echo $_SESSION['username'] . "<br>";
			echo "Successfully inserted a book!";

			$updateQuantityQuery="UPDATE books SET quantity = quantity + 1 WHERE ISBN = '$ISBN'";
			if($r=mysql_query($updateQuantityQuery))
			{
				echo "updated quantity!";
			}
			$addToSellingQuery="INSERT INTO `selling`(`sellPrice`, `condition`, `isbnSelling`, `userIDSelling`) VALUES ('$price','$condition','$ISBN','$id')";
			if($r=mysql_query($addToSellingQuery))
			{
				echo "inserted into selling!";
			}
		}
		else
		{
			//die('<p>Could not insert. ISBN already in books table! :<b>'.mysql_error().'</b></p>');
			echo 'ISBN already in books table, so it has not been inserted there.</p>';
			$updateQuantityQuery="UPDATE books SET quantity = quantity + 1 WHERE ISBN = '$ISBN'";
			if($r=mysql_query($updateQuantityQuery))
			{
				echo "updated quantity!";
			}
			$addToSellingQuery="INSERT INTO `selling`(`sellPrice`, `condition`, `isbnSelling`, `userIDSelling`) VALUES ('$price','$condition','$ISBN','$id')";
			if($r=mysql_query($addToSellingQuery))
			{
				echo "inserted into selling!";
			}
		}
	}
	else
	{
		echo "You must be logged in to sell a book!";
	}

	echo '. <a href="sellTextBooks.php">Go back</a>';


	/*$query="SELECT * FROM student";
	if($r=mysql_query($query)){      
	       //echo "dummy1";  
		while($row=mysql_fetch_array($r)){
	        //        echo "dummy 222 \n"; 
			print "<p>
	                {$row['id']}; 
	                {$row['name']}; </p>\n";
		}
	}*/

	?>
