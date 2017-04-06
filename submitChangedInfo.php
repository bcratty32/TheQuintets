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

    $changedEmail=$_POST['email'];
    $changedPassword=$_POST['password'];
    $usernameOfUser=$_SESSION['username'];


    $getIDofUser = "SELECT id FROM users WHERE username='$usernameOfUser'";

    $IDresults=mysql_query($getIDofUser);
    if (!$IDresults) 
    { // add this check.
      die('Invalid query: ' . mysql_error());
    }

    $IDrow=mysql_fetch_array($IDresults);
    $userID=$IDrow['id'];

    $updateUserInfo="UPDATE `users` SET `email`='$changedEmail', `password`='$changedPassword' WHERE id='$userID'";
    $updateResults=mysql_query($updateUserInfo);
    if (!$updateResults) 
    { // add this check.
      die('Invalid query: ' . mysql_error());
    }
    else
    {
        echo 'You have successfully changed your info. <a href="editUserInfo.php">Go back</a>';
    }
?>