<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel='stylesheet' href='../style/select_parcel.css'/>
</head>
<body>	
<main>
    <header>Welcome to CEI<br> Survey</header>
    <img src="../images/ocean.jpg" alt="redcap" width="100" height="150">
</main>


<?php
//connect to database
require_once '../sql/mysql_connection.php'; # for Plugin 

//assign if request is valid
if (isset($_GET["block"]) && isset($_GET["surveyor"])) {
    $block_id = $_GET['block'];
    $surveyor_id = $_GET['surveyor'];
    $surveyor_name = $_GET['name'];
}

//query using assigned variable
$parcel_query = $dbc->query("SELECT parcel_id, address FROM parcel_lookup
        WHERE block_id = " . $block_id) or die("problem connecting to parcel_lookup table");

print "<b>Surveyor</b>: $surveyor_name <br>";
print "<b>Block ID</b>: $block_id <br><br><br>";
    
$count = 1;
//fetch the row from returned query

while($row = $parcel_query->fetch_assoc()){
    print "<form action='survey.php' method='post'>";
    print "<input type='hidden' name='block_id' value='" . $block_id . "'/>";
    print "<input type='hidden' name='parcel_id' value='" . $row["parcel_id"] . "'/>";
    print "<input type='hidden' name='parcel_address' value='" . $row["address"] . "'/>";
    print "<label>" . $row["address"] . "</label>";
    print "<input id='Sbutton' type='submit' value='Parcel#$count'></form><br>";
    $count++;
}
//$_SESSION['parcelList'] = $rows;
print "<br><button type='button' onClick='window.close();'>Close</button>\n";
$dbc->close();
?>
</body>	

</html>
