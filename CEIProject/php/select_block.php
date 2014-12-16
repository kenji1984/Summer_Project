<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel='stylesheet' href='../style/select_parcel.css'/>
</head>

<body>	
<main>
    <header>Welcome to CEI <br> Survey</header>
    <img src="../images/car.jpg" alt="redcap" width="100" height="150">
</main>


<?php

//connect to database
require_once '../sql/mysql_connection.php';

//assign variable if valid request
if (isset($_GET["surveyors"])) {
    $surveyor_id = $_GET["surveyors"];
}

//query using assigned variable
$surveyor_query = $dbc->query("SELECT * FROM surveyor WHERE surveyor_id = $surveyor_id")
        or die("Problem connecting to Surveyor table");

//fetch row data from returned result
$row = $surveyor_query->fetch_assoc();

//another query
$blocks_query = $dbc->query("SELECT block_id , starting_address FROM block_lookup 
          WHERE batch_id = " . $row['batch_id'])
        or die("Problem connecting to block_lookup table");

print "<b> Surveyor : </b>" . $row['surveyor_name'] . "<br><br><br>";

print "<form action='select_parcel.php' method='get'>";

print "<input type='hidden' name='surveyor' value='" . $surveyor_id . "'>";
print "<input type='hidden' name='name' value='" . $row['surveyor_name'] . "'>";
print "<b>Select block: </b>";
print "<select name='block'>";

while ($row = $blocks_query->fetch_assoc()) {
    print "<option value='" . $row["block_id"] . "'> " . $row["starting_address"] . "</option>";
}
print "</select><br><br>";
print "<input id='submit' type='submit' value='Submit'></form>";

print "<button type='button' onClick='window.close();'>Close</button>";

$dbc->close();
?>

</body>
</html>

