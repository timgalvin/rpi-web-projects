<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Huffman Encoding</title>

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
            <li><a href="recipes.php">Recipe Database</a></li>
            <li class="active"><a href="#">Huffman</a></li>
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
	<h1>Huffman Encoding</h1>
        <div class="col-lg-6">
            <div class="well">
              <form class="bs-example form-horizontal" method="post" action="">
                <fieldset>
                  <legend>Encoding Text</legend>
                  <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Input Text</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="10" id="textArea" name="inputtext"><?php 
                        if (!empty($_POST)) {
                            echo $_POST["inputtext"];
                        }
                      ?></textarea>
                      <span class="help-block">Enter up to 5000 characters to encode. Use only alphanumeric, periods, and commas.</span>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                      <button type="submit" class="btn btn-primary">Submit</button> 
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="textArea" class="col-lg-2 control-label">Binary Output</label>
                    <div class="col-lg-10">
                      <textarea class="form-control" rows="10" id="textArea"><?php
                           if (!empty($_POST)) {
                              $escInput = escapeshellcmd($_POST["inputtext"]);
                              $output = shell_exec('/home/pi/huffman-translator/huffman "' . $escInput . '"');
                              $outputs = explode("@@@", $output);
                              echo $outputs[0];
                           }
                           ?></textarea>
                    </div>
                  </div>
                </fieldset>
              </form>
              
              <?php
                if (!empty($_POST)) {
                    echo "<h3>Compression Stats:</h3>";
                    $origLength = strlen($_POST["inputtext"]);
                    $finalLength = strlen($outputs[0]) / 8;
                    $ratio = round(($finalLength / $origLength), 2);
                    echo '<p>Compression ratio: ' . $ratio . '</p>';
                    echo '<div class="bs-example"><ul class="list-group">';
                    echo '<li class="list-group-item"><b>Binary Codes:</b></li>';
                    for ($i = 1; $i < sizeof($outputs); $i++) {
                        if ($outputs[$i] == ' ') {
                            $outputs[$i] = 'space';
                        }
                        echo '<li class="list-group-item">' . $outputs[$i] . '</li>';
                    }
                    echo '</ul></div>';
                }
              ?>
            </div>
          </div>
	  <div class="col-lg-6">
		  <p>Here we can write about information about the Huffman algorithm and give thanks where needed.</p>
	  </div>

    </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
