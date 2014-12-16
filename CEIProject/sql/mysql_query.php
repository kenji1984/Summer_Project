<?php

//this file is for processing of safe inputs only. 
//for survey question inputs. Make a new php file to protect against SQL injections

require_once './mysql_connection.php';

if (isset($_POST['block_id'], $_POST['address'])) {
    $block_id = mysqli_real_escape_string($dbc, htmlentities($_POST['block_id']));
    $address = mysqli_real_escape_string($dbc, htmlentities($_POST['address']));
    $button = mysqli_real_escape_string($dbc, htmlentities($_POST['button']));

    $parcel_query = $dbc->query("SELECT parcel_id, address FROM parcel_lookup
    WHERE block_id = " . $block_id) or die("problem connecting to parcel_lookup table");

    $rows = array();
    while ($row = $parcel_query->fetch_assoc()) {
        $rows[] = $row;
    }

    for ($i = 0; $i < count($rows); $i++) {
        if ($rows[$i]['address'] == $address && $button == 'Previous' && $i != 0) {
            echo $returnData = json_encode($rows[$i - 1]);
        } else if ($rows[$i]['address'] == $address && $button == 'Next' && $i != count($rows)) {
            echo $returnData = json_encode($rows[$i + 1]);
        }
    }
}

if(isset($_POST['parcel_id'])){
    $parcel_id = mysqli_real_escape_string($dbc, htmlentities($_POST['parcel_id']));
    
    $select = $dbc->query("select pid from test_parcel_table where pid =" . $parcel_id);
    
    if($select->num_rows > 0){
        echo 'taken';
    }
    else {
        echo 'available';
    }
}
