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

        <title>Contact Us</title>

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
                <li class="active"><a href="contactUs.php">Contact Us</a></li>
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

  <!--<div class="jumbotron jumbotron-sm">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <h1 class="h1">
                    Contact us <small>Feel free to contact us</small>
                </h1>
            </div>
        </div>
    </div>
  </div>-->

<div class="container" id="contactSnippet">
    <div class="row">
        <div class="col-md-8">
            <div class="well well-sm">
                <form method="post" action="emailAction.php">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Name</label>
                            <input type="text" class="form-control" id="name" placeholder="Enter name" required="required" />
                        </div>
                        <div class="form-group">
                            <label for="email">
                                Email Address</label>
                            <div class="input-group">
                                <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                                </span>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required="required" /></div>
                        </div>
                        <div class="form-group">
                            <label for="subject">
                                Subject</label>
                            <select id="subject" name="subject" class="form-control" required="required">
                                <option value="na" selected="">Choose One:</option>
                                <option value="service">General Customer Service</option>
                                <option value="suggestions">Suggestions</option>
                                <option value="product">Product Support</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">
                                Message</label>
                            <textarea name="message" id="message" class="form-control" rows="9" cols="25" required="required"
                                placeholder="Message"></textarea>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" id="btnContactUs">
                            Send Message</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <form>
            <legend><span class="glyphicon glyphicon-globe"></span> Our office</legend>
            <address>
                <strong>Student Textbooks, Inc.</strong><br>
                Henson Hall, Room 150<br>
                Salisbury, MD 21804<br>
            </address>
            <address>
                <strong>COSC 386</strong><br>
                studentBookMarketplace@gmail.com
            </address>
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