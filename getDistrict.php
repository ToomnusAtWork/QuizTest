<?php
include('condb.php');

$regionID = $_GET['region_id'];
$querys = $conn->query(query: "SELECT * FROM `eadesign_romcity` WHERE `region_id` = $regionID ORDER BY `entity_id` ASC") ;

$json = array();

while ($result = $querys->fetchArray()) {
    $json[] = $result;
}

echo json_encode($json);
