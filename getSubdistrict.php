<?php
require('condb.php');

$cityID = $_GET['city_id'];
$query = $conn->query("SELECT * FROM `eadesign_romdistrict` WHERE `city_id` = $cityID ORDER BY `entity_id` ASC");

$json = array();

while ($result = $query->fetchArray()) {
    $json[] = $result;
}

echo json_encode($json);
