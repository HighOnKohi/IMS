<?php
include "MyConnection.php";

$selectedOption = $_POST['filter'];

$filteredData = array();
foreach ($originalData as $item) {
if ($item['infraction'] == $selectedOption) {
    $filteredData[] = $item;
}
}
?>