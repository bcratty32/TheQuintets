<?php
session_start();
?>
<html>
    <head>
        <link rel="icon" href="../favicon.ico">
        <title>Books You're Selling</title>
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
                <li><a href="buyTextBooks.php">Buy Textbooks</a></li>
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
                        <h4>
                            Books You're Currently Selling! (Click an entry to remove it/if sold)
                        </h4>
                    </div>
                    <table class="table table-fixed" id="tableID">
                    <thead>
                        <tr>
                            <th class="col-xs-3 text-center">Title</th>
                            <th class="col-xs-3 text-center">Author</th>
                            <th class="col-xs-2 text-center">ISBN</th>
                            <th class="col-xs-4 text-center">
                                <div class="col-xs-3">Edition</div>
                                <div class="col-xs-3">Year</div>
                                <div class="col-xs-3">Condition</div>
                                <div class="col-xs-3">Sell Price</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            $usernameOfUser=$_SESSION['username'];

                            $queryString = "SELECT id FROM users WHERE username='$usernameOfUser'";

                            $results=mysql_query($queryString);
                            if (!$results) 
                            { // add this check.
                                die('Invalid query: ' . mysql_error());
                            }

                            $row=mysql_fetch_array($results);
                            $userID=$row['id'];

                            $queryString = "SELECT books.Title, books.Author, books.Year, books.Edition, books.ISBN, selling.sellPrice, selling.Condition FROM books, selling WHERE selling.userIDSelling='$userID' AND selling.isbnSelling = books.ISBN";
                            $results=mysql_query($queryString);
                            if (!$results) 
                            { // add this check.
                                die('Invalid query: ' . mysql_error());
                            }

                            while($row = mysql_fetch_array($results))
                            {
                            ?>
                              <tr class="row container clickable-row" style="cursor: pointer;">
                                <td class="col-xs-3 text-center"><?php echo $row['Title']?> </a> </td>
                                <td class="col-xs-3 text-center"><?php echo $row['Author']?></td>
                                <td class="col-xs-2 text-center"><?php echo $row['ISBN']?></td>
                                <td class="col-xs-4 text-center">
                                    <div class="col-xs-3"><?php echo $row['Edition']?></div>
                                    <div class="col-xs-3"><?php echo $row['Year']?></div>
                                    <div class="col-xs-3"><?php echo $row['Condition']?></div>
                                    <div class="col-xs-3"><?php echo $row['sellPrice']?></div>
                                    <td style="display:none;"><?php echo $userID ?></td>
                                </td>
                                
                              </tr>

                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-xs-4">
        </div>
        <div class="col-xs-4">
            <div class="col-xs-6">
                <form name="deletingFromSelling" id="deleteFromSelling" method="post" action="sellingRemovalSold.php">
                    <input type="hidden" name="isbnForSelling" value="">
                    <input type="hidden" name="conditionForSelling" value="">
                    <input type="hidden" name="priceForSelling" value="">
                    <input type="hidden" name="userIDForSelling" value="">
                    <button type="submit" class="btn btn-success">Mark As Sold</button>
                </form>
            </div>
            <div class="col-xs-6">
                <form name="markingAsSold" id="markedAsSold" method="post" action="sellingRemoval.php">
                    <input type="hidden" name="isbnForSelling" value="">
                    <input type="hidden" name="conditionForSelling" value="">
                    <input type="hidden" name="priceForSelling" value="">
                    <input type="hidden" name="userIDForSelling" value="">
                    <button type="submit" class="btn btn-danger">Remove Listing</button>
                </form>
            </div>
        </div>
        <div class="col-xs-4">
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
                    var check = target.getElementsByTagName("div");
                }
                document.deletingFromSelling.isbnForSelling.value = cells[2].innerHTML;
                document.deletingFromSelling.conditionForSelling.value = check[2].innerHTML;
                document.deletingFromSelling.priceForSelling.value = check[3].innerHTML;
                document.deletingFromSelling.userIDForSelling.value = cells[4].innerHTML;

                document.markingAsSold.isbnForSelling.value = cells[2].innerHTML;
                document.markingAsSold.conditionForSelling.value = check[2].innerHTML;
                document.markingAsSold.priceForSelling.value = check[3].innerHTML;
                document.markingAsSold.userIDForSelling.value = cells[4].innerHTML;
                //document.getElementById('deleteFromSelling').submit();
            };
            
            $('#tableID').on('click', '.clickable-row', function(event) {
              $(this).addClass('active').siblings().removeClass('active');
            });

            </script>
</html>