<?php

require_once('connect.php');

$sql = 'SELECT * FROM `argonaute`';
$query = $db->prepare($sql);
$query->execute();
$result = $query->fetchAll(PDO::FETCH_ASSOC);
