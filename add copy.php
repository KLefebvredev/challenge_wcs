<?php
// On démarre une session
session_start();

mb_internal_encoding("UTF-8");
function mb_ucfirst($string)
{
    $string = mb_strtolower($string);
    return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1);
}

if ($_POST) {
    if (
        isset($_POST['nom']) && !empty($_POST['nom'])
    ) {
        // On inclut la connexion à la base
        require_once('connect.php');

        // On nettoie les données envoyées
        $nom = htmlentities(mb_ucfirst(trim($_POST['nom'])), ENT_QUOTES);

        $sql = 'INSERT INTO `argonaute` (`nom`) VALUES (:nom);';

        $query = $db->prepare($sql);

        $results = $query->bindValue(':nom', $nom, PDO::PARAM_STR);

        $query->execute();

        $_SESSION['message'] = "Argonaute ajouté";

        header('Location: index.php');
    } else {
        $_SESSION['erreur'] = "Veuillez rentrer le nom d'un Argonaute";
        header('Location: index.php');
    }
}
