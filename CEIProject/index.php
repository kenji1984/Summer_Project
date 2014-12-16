<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel='stylesheet' href='style/select_parcel.css'/>
</head>
<body>	
<main>
    <header>Welcome to CEI<br> Survey</header>
    <img src="images/gun.jpg" alt="redcap" width="100" height="150">
</main>
<br><br>

<?php

include 'sql/mysql_connection.php'; # for Plugin 

$result = $dbc->query("SELECT * FROM surveyor") or die("Problem connecting to Surveyor table");

print "<form action='php/select_block.php' method='get'>";
print "<b>Select surveyor: </b>";
print "<select name='surveyors'>";
while ($row = $result->fetch_assoc()) {
    print "<option value='" . $row["surveyor_id"] . "'> " . $row["surveyor_name"] . "</option>";
}
print "</select><br><br>";
print "<input id='submit' type='submit' value='Submit'></form>";

print "<button type='button'  onClick='window.close();'>Close</button>\n";
?>
    
</body>
</html>