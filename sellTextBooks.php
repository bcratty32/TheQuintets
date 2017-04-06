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

        <title>Sell a Book</title>

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
        <link href="../css/sellTextBooks.css" rel="stylesheet">
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
                <li class="active"><a href="sellTextBooks.php">Sell Textbooks</a></li>
                <li><a href="aboutUs.php">About Us</a></li>
                <li><a href="contactUs.php">Contact Us</a></li>
                <li><a href="safety.php">Safety Precautions</a></li>
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

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
            <form class="form-signin" method="post" action="sellTextBooksScript.php">
                <div class="searchSellWrap">
                    <h1>
                        <center>Sell Your Textbooks!</center>
                    </h1>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label for="usr">Title:</label>
                          <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <div class="form-group">
                          <label for="usr">Author:</label>
                          <input type="text" class="form-control" id="author" name="author" required>
                        </div>
                                                <div class="form-group">
                          <label for="usr">Price:</label>
                          <input type="text" class="form-control" id="price" name="price" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label for="usr">Year:</label>
                          <input type="text" class="form-control" id="year" name="year" required>
                        </div>
                        <div class="form-group">
                          <label for="usr">Edition:</label>
                          <input type="text" class="form-control" id="edition" name="edition" required>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label for="usr">ISBN:</label>
                          <input type="text" class="form-control" id="isbn" name="isbn" required>
                        </div>
                        <div class="form-group">
                          <label for="usr">Condition:</label>
                          <input type="text" class="form-control" id="condition" name="condition" required>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
              </form>
            </div>

        </div>
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