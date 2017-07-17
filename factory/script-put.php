<?php
include("PDOConnect.php");

$fstream = file_get_contents("php://input");
$data = json_decode($fstream);

$data = PDOConnect::getInstance()->query("UPDATE fiche_content SET soustitre = '". $data->soustitre ."' WHERE id = 3");
echo $data->soustitre;
