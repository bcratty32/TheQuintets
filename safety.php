<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="../favicon.ico">

        <title>Safety</title>

        <!-- Bootstrap core CSS -->
        <link href="../css/bootstrap.min.css" rel="stylesheet">

        <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
        <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <!--<link href="signin.css" rel="stylesheet">-->

        <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
        <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
        <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Custom styles for this template -->
        <link href="../css/contactus.css" rel="stylesheet">
        <link href="../css/carousel.css" rel="stylesheet">
  </head>
  <body>
<!-- NAVBAR -->
    <div class="navbar-wrapper">
      <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
          <div class="container">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#">Student Book Marketplace</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
                <li><a href="index.php">Home</a></li>
                <li><a href="buyTextBooks.php">Buy Textbooks</a></li>
                <li><a href="sellTextBooks.php">Sell Textbooks</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
                <li class="active"><a href="safety.php">Safety Precautions</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                  <?php if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)
                  { 
                    //echo '<li><a href="logout.php"> Log out </a></li>';
                  ?>
                  <li class="dropdown">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle"> <?php echo $_SESSION['username'] ?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="editUserInfo.php">Edit Information</a></li>
                            <li><a href="viewSellingBooks.php">Books You're Selling</a></li>
                        </ul>
                    </li>
                    <li><a href="logout.php"> Logout </a></li>
                  <?php
                  }
                  else
                  {
                    echo '<li><a href="signIn.php"> Login </a></li>';
                  }
                  ?>      
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <!-- END OF NAVBAR -->

  <div class="col-md-2 row">
  </div>
  <div class="col-md-8 text-center">
    <div class="row">
        <h1>
          <br/>
          <br/>
          Safety Precautions and Tips for Using This Site:
        </h1>
    </div>
    <div class="row">
    <br/>
    <h2>
    	For meeting in person to exchange books:
    </h2>
    	1: Insist on meeting in a public place. <br/><br/>
    	2: Don't accept travel from the other person, get there on your own. <br/><br/>
    	3: Either have a friend accompany you or let somebody know where you will be/what you are doing.<br/><br/>
    	4: Trust your instincts.
    </div>
    <div class="row">
    <br/>
    <h2>
    	For exchanging done online through mail:
    </h2>
    	1: Ask to see picture(s) of the item being exchanged. <br/><br/>
    	2: Ask about shipping and handling terms.<br/><br/>
    	3: Make sure both parties agree on the items being exchanged.<br/><br/>
    	4: Use a trusted payment service such as paypal.
    </div>
  </div>
  <div class="col-md-2">
  </div>
  </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="../js/bootstrap.min.js"></script>
    <!-- Just to make our placeholder images work. Don't actually copy the next line! -->
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
 </html>