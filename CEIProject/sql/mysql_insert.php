<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'mysql_connection.php';
/*
$parcelIndex = mysqli_real_escape_string($dbc, htmlentities($_POST['pIndex']));
$parcelID = mysqli_real_escape_string($dbc, htmlentities($_POST['pID']));
$blockIndex = mysqli_real_escape_string($dbc, htmlentities($_POST['bIndex']));
$blockID = mysqli_real_escape_string($dbc, htmlentities($_POST['bID']));
$address = mysqli_real_escape_string($dbc, htmlentities($_POST['address']));
$query = "insert into test_parcel_table values('$parcelIndex', '$parcelID', " .
       "'$blockIndex', '$blockID', '$address')";
    */
$result = $dbc->query("select * from test_parcel_table");

while($row = $result->fetch_assoc()){
    echo $row['pid'], '<br>';
}

//$result = mysqli_query($dbc, $query) or die('Error querrying database');

mysqli_close($dbc);
