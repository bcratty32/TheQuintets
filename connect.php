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
error_reporting(E_ALL & E_NOTICE);

//Attempt to connect

if($connection=@mysql_connect('localhost', 'tshay1', 'DHS23Hornets')){
   print '<p>Successfully connected to MySQL.</p>';
}else{

	die('<p>Could not connect to MySQL because:<b>'.mysql_error().'</b></p>');
}
if(@mysql_select_db("tshay1DB", $connection)){
	print '<p> The tshay1DB database has been selected</p>';
}else{
	die('<p>Could not select the tshay1DB database because:<b>'.mysql_error().'</b></p>');
}
$query="SELECT * FROM student";
if($r=mysql_query($query)){      
       //echo "dummy1";  
	while($row=mysql_fetch_array($r)){
        //        echo "dummy 222 \n"; 
		print "<p>
                {$row['id']}; 
                {$row['name']}; </p>\n";
	}
}
?>
</body>
</html>
