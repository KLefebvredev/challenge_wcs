<?php

try {
    //Connection à la base
    $db = new PDO('mysql:host=localhost;dbname=wcs;port=3307;cherset=utf8', 'root', '');
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
    die();
}
