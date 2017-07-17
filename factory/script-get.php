<?php
include("PDOConnect.php");

$data = PDOConnect::getInstance()->query("SELECT fc.id as fcid, fc.id_fiche_index, fc.id_langue, fc.online, fc.titre, fc.soustitre, fc.accroche, fc.description, fc.dateStart, fc.dateEnd, fi.id as fiid, fi.id_rubrique, fi.priorite FROM fiche_content as fc LEFT JOIN fiche_index as fi ON fc.id_fiche_index = fi.id WHERE fc.id_langue = 1 ORDER BY fi.priorite");
$row = $data->fetchAll(PDO::FETCH_ASSOC);

$encoded = [];

foreach ($row as $elem) {
 $encoded[] = json_encode($elem);
}

echo json_encode($encoded);
