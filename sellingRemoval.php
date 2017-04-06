<?php
session_start();
?>
<html>
    <head>
        <title>Last 10 Results</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/buyTextBooks.css" rel="stylesheet">
        <link href="../css/contactus.css" rel="stylesheet">
        <link href="../css/carousel.css" rel="stylesheet">

        <!-- trying to link javascript for it to work-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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



    $isbnSellRemove=$_POST['isbnForSelling'];
    $conditionSellRemove=$_POST['conditionForSelling'];
    $sellPriceRemove=$_POST['priceForSelling'];
    $userIDRemove=$_POST['userIDForSelling'];

    $try = "DELETE FROM selling WHERE isbnSelling='$isbnSellRemove' AND `condition`='$conditionSellRemove' AND sellPrice='$sellPriceRemove' AND userIDSelling='$userIDRemove'";
    $results=mysql_query($try);
    if (!$results) 
    { // add this check.
      die('Invalid query: ' . mysql_error());
    }
    else
    {?>
    <?php
    	$getQuantityOfBook="SELECT quantity FROM books WHERE ISBN='$isbnSellRemove'";
    	if($r=mysql_query($getQuantityOfBook))
      	{
      		$row=mysql_fetch_array($r);
      		echo $row['quantity'];
      	}
      	if($row['quantity']>1)
      	{
      		$updateQuantityQuery="UPDATE books SET quantity = quantity - 1 WHERE ISBN = '$isbnSellRemove'";
  	      if($r=mysql_query($updateQuantityQuery))
  	      {
  	        echo 'Successfully removed that book from the sales listings! Updated books quantity! <a href="viewSellingBooks.php">Go back</a>';
  	      }
      	}
      	else
      	{
      	  $updateQuantityQuery="DELETE FROM books WHERE ISBN = '$isbnSellRemove'";
  	      if($r=mysql_query($updateQuantityQuery))
  	      {
  	        echo 'Successfully removed that book from the sales listings! Updated books quantity! <a href="viewSellingBooks.php">Go back</a>';
  	      }
      	}
    }
    ?>
  </body>
</html>