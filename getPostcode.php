<?php
require('condb.php');

$subdistrictID = $_GET['district_code'];
$query = $conn->query("SELECT * FROM `eadesign_rompostcode` WHERE `district_code` = $subdistrictID  ORDER BY `entity_id` ASC");

$json = array();

while ($result = $query->fetchArray()) {
    $json[] = $result;
}

echo json_encode($json);
