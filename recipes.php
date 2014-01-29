<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Recipe Database</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/navbar-fixed-top.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <!-- Fixed navbar -->
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">Tim Galvin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.html">Home</a></li>
            <li class="active"><a href="#">Recipe Database</a></li>
            <li><a href="huffman.php">Huffman</a></li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">Contact <b class="caret"></b></a>
              <ul class="dropdown-menu">
                <li><a href="#">Action</a></li>
                <li><a href="#">Another action</a></li>
                <li><a href="#">Something else here</a></li>
                <li class="divider"></li>
                <li class="dropdown-header">Nav header</li>
                <li><a href="#">Separated link</a></li>
                <li><a href="#">One more separated link</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>

    <div class="container">
	<h1>The Recipe Vault</h1>
	<div class="col-lg-6">	
           <div class="bs-example">
              <ul class="list-group">
	             <?php
                    mysql_connect("localhost","dataworker","admin") or die(mysql_error());
                    mysql_select_db("maindb") or die(mysql_error());
                    $result = mysql_query("SELECT * FROM Recipes") or die(mysql_error());

                    while($row = mysql_fetch_array($result)) {
		               echo "<li class=\"list-group-item\">";
		               echo $row['Recipe_Name'];
                    }
                    echo "</ul>";
                     
                    if (!empty($_POST)) {
                       $myQuery = "INSERT INTO recipes VALUES (Recipe_Name";
                       $tailQuery = "VALUES ('" . $_POST['recipeName'] . "'";
                       if (isset($_POST['ingredient1'])) {
                          $myQuery = $myQuery . ", Ingredient1";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient1'] . "'";
                       }
                       if (isset($_POST['ingredient2'])) {
                          $myQuery = $myQuery . ", Ingredient2";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient2'] . "'";
                       }
                       if (isset($_POST['ingredient3'])) {
                          $myQuery = $myQuery . ", Ingredient3";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient3'] . "'";
                       }
                       if (isset($_POST['ingredient4'])) {
                          $myQuery = $myQuery . ", Ingredient4";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient4'] . "'";
                       }
                       if (isset($_POST['ingredient5'])) {
                          $myQuery = $myQuery . ", Ingredient5";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient5'] . "'";
                       }
                       if (isset($_POST['ingredient6'])) {
                          $myQuery = $myQuery . ", Ingredient6";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient6'] . "'";
                       }
                       if (isset($_POST['ingredient7'])) {
                          $myQuery = $myQuery . ", Ingredient7";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient7'] . "'";
                       }
                       if (isset($_POST['ingredient8'])) {
                          $myQuery = $myQuery . ", Ingredient8";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient8'] . "'";
                       }
                       if (isset($_POST['ingredient9'])) {
                          $myQuery = $myQuery . ", Ingredient9";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient9'] . "'";
                       }
                       if (isset($_POST['ingredient10'])) {
                          $myQuery = $myQuery . ", Ingredient10";
                          $tailQuery = $tailQuery . ", '" . $_POST['ingredient10'] . "'";
                       }
                       if (isset($_POST['instructions'])) {
                          $myQuery = $myQuery . ", Instructions";
                          $tailQuery = $tailQuery . ", '" . $_POST['instructions'] . "'";
                       }
                       $myQuery = $myQuery . ") " . $tailQuery . ");";
                       echo $myQuery;
                    }
                 ?>
            </div>
	</div>
	<div class="col-lg-6">
		<p>When I'm coding, I'm always thinking about food, and when I'm eating I am usually thinking of ways to tackle my latest coding challenge. This page seeks to combine two of my favorite things in to one. The real goal here was to become more comfortable working with databases.</p><p>Feel free to take a look at one of my favorite recipes here on this page and give one a try!</p>
	</div>

    </div>
    <div class="container">
        <div class="col-lg-6">
            <div class="well">
              <form class="bs-example form-horizontal" method="post" action="">
                <fieldset>
                  <legend>Enter a new recipe</legend>
                  <div class="form-group">
                    <label for="inputEmail" class="col-lg-2 control-label">Title</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputRecipeName" name="recipeName"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng1" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng1" name="ingredient1"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng2" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng2" name="ingredient2"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng3" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng3" name="ingredient3"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng4" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng4" name="ingredient4"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng5" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng5" name="ingredient5"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng6" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng6" name="ingredient6"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng7" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng7" name="ingredient7"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng8" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng8" name="ingredient8"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng9" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng9" name="ingredient9"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputIng10" class="col-lg-2 control-label">Ingredient</label>
                    <div class="col-lg-10">
                      <input type="text" class="form-control" id="inputIng10" name="ingredient10"></input>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Instructions</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="7" id="textArea" name="instructions"></textarea>
                      <span class="help-block">Enter instructions for the recipe here.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" class="btn btn-primary">Submit</button> 
                    </div>
                  </div>
                </fieldset>
              </form>
            </div>
          </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
