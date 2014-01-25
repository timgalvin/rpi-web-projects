<!DOCTYPE html>
<html>
    <head>
        <title>DB Display</title>
        <link rel="stylesheet" href="style.css" type="text/css">    
    </head>
    <body>
        <h1>Database Display</h1>
        <p>Here's where we'll display the DB</p>
        <center>
        <?php
            mysql_connect("localhost","dataworker","admin") or die(mysql_error());
            mysql_select_db("maindb") or die(mysql_error());

            $result = mysql_query("SELECT * FROM contacts") or die(mysql_error());
            
            echo "<table border='1'>";
            echo "<tr><th>First Name</th><th>Last Name</th><th>Phone</th><th>Email</th><th>Favorite Color</th></tr>";
            while($row = mysql_fetch_array($result)) {
                echo "<tr><td>";
                echo $row['first_name'];
                echo "</td><td>";
                echo $row['last_name'];
                echo "</td><td>";
                echo $row['phone'];
                echo "</td><td>";
                echo $row['email'];
                echo "</td><td>";
                echo $row['favorite_color'];
                echo "</td></tr>";
            }
            echo "</table>";
        ?>
        </center>
    </body>
</html>

