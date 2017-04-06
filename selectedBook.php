<?php
session_start();
?>
<html>
    <head>
        <link rel="icon" href="../favicon.ico">
        <title>Selected Book</title>
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
    <br/>
    <br/>
    <br/>
    <br/>

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
                                                <?php
                            $isbnSearch=$_POST['formvar'];

                            $queryString = "SELECT * FROM books WHERE isbn='$isbnSearch'";

                            $results=mysql_query($queryString);
                            if (!$results) 
                            { // add this check.
                                die('Invalid query: ' . mysql_error());
                            }
                            $row = mysql_fetch_array($results);
                            //echo "Title: ".$row['Title'];
                            //echo "Author: ".$row['Author'];
                            ?>
                            <div class="row">
                              <div class="col-xs-4">
                                <?php echo "Title: ".$row['Title']; ?>
                                <br/>
                                <?php echo "ISBN: ".$row['ISBN']; ?>
                              </div>
                              <div class="col-xs-4 text-center">
                                <?php echo "Edition: ".$row['Edition']; ?>
                              </div>
                              <div class="col-xs-4 text-right">
                                <?php echo "Author: ".$row['Author']; ?>
                                <br/>
                                <?php echo "Year: ".$row['Year']; ?>
                              </div>
                            </div>
                    </div>
                    <table class="table table-fixed" id="tableID">
                    <thead>
                        <tr>
                            <th class="col-xs-4 text-center">Condition</th>
                            <th class="col-xs-4 text-center">User Selling</th>
                            <th class="col-xs-4 text-center">Sell Price</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $isbnSearch=$_POST['formvar'];

                            $queryString = "SELECT * FROM books, selling, users WHERE selling.isbnSelling='$isbnSearch' AND selling.isbnSelling=books.ISBN AND selling.userIDSelling=users.id";

                            $results=mysql_query($queryString);
                            if (!$results) 
                            { // add this check.
                                die('Invalid query: ' . mysql_error());
                            }
                        while($row = mysql_fetch_array($results))
                        {
                        ?>
                          <tr class="row container" style="cursor: pointer;">
                            <td class="col-xs-4 text-center"><?php echo $row['condition']?> </a> </td>
                            <td class="col-xs-4 text-center"><?php echo $row['username']?></td>
                            <td class="col-xs-4 text-center"><?php echo $row['sellPrice']?></td>
                            <td style="display:none;"><?php echo $row['email'] ?></td>
                          </tr>

                        <?php
                        }
                        ?>
                        </tbody>
                </table>
            </div>
            </div>
        </div>



                <div class="container">
            <div class="row">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                                                <?php
                            $isbnSearch=$_POST['formvar'];

                            $queryString = "SELECT * FROM books WHERE isbn='$isbnSearch'";

                            $results=mysql_query($queryString);
                            if (!$results) 
                            { // add this check.
                                die('Invalid query: ' . mysql_error());
                            }
                            $row = mysql_fetch_array($results);
                            //echo "Title: ".$row['Title'];
                            //echo "Author: ".$row['Author'];
                            ?>
                            <div class="row">
                                <h4>
                                Previous Sales of This Book
                                </h4>
                            </div>
                    </div>
                    <table class="table table-fixed" id="tableID">
                    <thead>
                        <tr>
                            <th class="col-xs-4 text-center">Username Of Seller</th>
                            <th class="col-xs-4 text-center">Price Sold For</th>
                            <th class="col-xs-4 text-center">Condition</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $isbnSearch=$_POST['formvar'];

                            $queryString = "SELECT * FROM soldBooks WHERE ISBN='$isbnSearch'";

                            $results=mysql_query($queryString);
                            if (!$results) 
                            { // add this check.
                                die('Invalid query: ' . mysql_error());
                            }
                        while($row = mysql_fetch_array($results))
                        {
                        ?>
                          <tr class="row container">
                            <td class="col-xs-4 text-center"><?php echo $row['sellerUsername']?> </a> </td>
                            <td class="col-xs-4 text-center"><?php echo $row['price']?></td>
                            <td class="col-xs-4 text-center"><?php echo $row['condition'] ?></td>
                          </tr>

                        <?php
                        }
                        ?>
                        </tbody>
                </table>
            </div>
            </div>
        </div>



    </body>
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
                alert("For buying this book, contact the seller at: " + cells[3].innerHTML);
            };
            </script>
</html>