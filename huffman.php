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
            <!--<li class="dropdown">
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
            </li>-->
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
                    echo '<p>Output size factor:  ' . $ratio . '</p>';
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
          <h3>Background</h3>
		  <p>This page uses the Huffman encoding algorithm to compress a string of text in to a smaller size. The resulting output is in "human readable" binary (a bunch of 1's and 0's). The basic principle here is that, usually, the standard 8 bit byte is larger than required to represent a sample of text. For example to represent the 26 letters of the English alphabet, we could get away with just 5 bits (2 ^ 5 = 32, 6 more than needed!). But it isn't as simple as assigning a to 00001, b to 00010, z to 11001, and so on. The second key to the process is the idea that characters which show up more often, ought to be represented by fewer bits. This ensures that characters used more often, take up less space. Brilliant!</p>
          <h3>The Creator</h3>
          <p>David A. Huffman pioneered this compression method during his Ph.D. research at MIT in 1952. The algorithm is optimal when one character is to be represented on its own. Although more effective algorithms exist for compressing data, they operate on the basis grouping patterns of characters together. Still, Huffman encoding can produce some impressive results.</p>
          <h3>Closing</h3>
          <p>The code I wrote for the encoding can be found on <a href="https://github.com/timgalvin/huffman-translator">GitHub</a>. Big thanks go out to all of my information sources for this project including Dr. Zander from UW Bothell, <a href="http://en.wikipedia.org/wiki/Huffman_coding">Wikipedia</a>, Kenneth H. Rosen's <a href="http://amzn.com/0073383090">Discrete Mathematics</a> book, and <a href="http://www.programminglogic.com/implementing-huffman-coding-in-c/">Daniel Scocco</a>.</p>
          <p>As time permits, I plan to add functionality for encoding the binary output to actual characters, file I/O, and sharing.</p>
          
	  </div>

    </div>
    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
