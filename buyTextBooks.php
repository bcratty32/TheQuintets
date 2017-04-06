<?php
session_start();
?>
<html>
    <head>
        <link rel="icon" href="../favicon.ico">
        <title>Buy a Book</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/buyTextBooks.css" rel="stylesheet">
        <link href="../css/contactus.css" rel="stylesheet">
        <link href="../css/carousel.css" rel="stylesheet">

        <!-- trying to link javascript for it to work-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
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
                <li class="active"><a href="buyTextBooks.php">Buy Textbooks</a></li>
                <li><a href="sellTextBooks.php">Sell Textbooks</a></li>
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
            <form class="form-signin" method="post" action="buyTextBooks.php">
                <div class="searchBuyWrap">
                    <h1>
                        <center>Buy Textbooks!</center>
                    </h1>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label for="usr">Title:</label>
                          <input type="text" class="form-control" id="usr" name="title">
                        </div>
                        <div class="form-group">
                          <label for="usr">Author:</label>
                          <input type="text" class="form-control" id="usr" name="author">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label for="usr">Year:</label>
                          <input type="text" class="form-control" id="usr" name="year">
                        </div>
                        <div class="form-group">
                          <label for="usr">Edition:</label>
                          <input type="text" class="form-control" id="usr" name="edition">
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="form-group">
                          <label for="usr">ISBN:</label>
                          <input type="text" class="form-control" id="usr" name="isbn">
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
              </form>
            </div>

        </div>
    </div>



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

?>

        <div class="container">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h4>
                            Textbooks Currently For Sale 
                        </h4>
                    </div>
                    <table class="table table-fixed" id="tableID">
                    <thead>
                        <tr>
                            <th class="col-xs-4">Title</th>
                            <th class="col-xs-3">Author</th>
                            <th class="col-xs-2">ISBN</th>
                            <th class="col-xs-3">
                                  <div class="col-xs-4">
                                    Edition
                                  </div>
                                  <div class="col-xs-4">
                                    Year
                                  </div>
                                  <div class="col-xs-4">
                                    Quantity
                                  </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                    if (!empty($_POST['title']))
                    {
                    $title=$_POST['title'];
                    }
                    if (!empty($_POST['author']))
                    {
                    $author=$_POST['author'];
                    }
                    if (!empty($_POST['isbn']))
                    {
                    $isbn=$_POST['isbn'];
                    }
                    if (!empty($_POST['edition']))
                    {
                    $edition=$_POST['edition'];
                    }
                    if (!empty($_POST['year']))
                    {
                    $year=$_POST['year'];
                  }


                    $queryString = "SELECT * FROM books WHERE 1=1";
                    if (!empty($_POST['title']))
                    {
                      if($title!="")
                      {
                          $queryString.=" AND title like '%$title%'";
                      }
                    }
                    if (!empty($_POST['author']))
                    {
                      if($author!="")
                      {
                          $queryString.=" AND author like '%$author%'";
                      }
                    }
                    if (!empty($_POST['isbn']))
                    {
                      if($isbn!="")
                      {
                          $queryString.=" AND isbn='$isbn'";
                      }
                    }
                    if (!empty($_POST['edition']))
                    {
                      if($edition!="")
                      {
                          $queryString.=" AND edition='$edition'";
                      }
                    }
                    if (!empty($_POST['year']))
                    {
                      if($year!="")
                      {
                          $queryString.=" AND year='$year'";
                      }
                    }


                    $results=mysql_query($queryString);
                    if (!$results) 
                    { // add this check.
                        die('Invalid query: ' . mysql_error());
                    }


                    while($row = mysql_fetch_array($results))
                    {
                    ?>
                    <tr class="row container" style="cursor: pointer">
                      <td class="col-xs-4"><?php echo $row['Title']?> </a> </td>
                      <td class="col-xs-3"><?php echo $row['Author']?></td>
                      <td class="col-xs-2"><?php echo $row['ISBN']?></td>
                      <td class="col-xs-3">
                        <div class="col-xs-4">
                          <?php echo $row['Edition']?>
                        </div>
                        <div class="col-xs-4">
                          <?php echo $row['Year']?>
                        </div>
                        <div class="col-xs-4">
                           <?php echo $row['Quantity']?>
                        </div>
                      </td>
                    </tr>

                    <?php
                    }
                    ?>
                    </tbody>
                  </div>
                </div>
            </div>
            </table>

            <!-- gets isbn from row clicked-->
            <script type="text/javascript">
            var table = document.getElementsByTagName("table")[0];
            var tbody = table.getElementsByTagName("tbody")[0];
            tbody.onclick = function (e) {
                e = e || window.event;
                var data = [];
                var target = e.srcElement || e.target;
                while (target && target.nodeName !== "TR") {
                    target = target.parentNode;
                }
                if (target) {
                    var cells = target.getElementsByTagName("td");
                    for (var i = 0; i < cells.length; i++) {
                        data.push(cells[i].innerHTML);
                    }
                }
                //alert(cells[2].innerHTML);
                document.myform3.formvar.value = cells[2].innerHTML;
                document.getElementById('isbnForm').submit();
            };
            </script>

          <form name="myform3" id="isbnForm" method="post" action="selectedBook.php">
            <input type="hidden" name="formvar" value="" />
          </form>

    </body>
</html>