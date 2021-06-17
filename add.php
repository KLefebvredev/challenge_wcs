<?php
// On démarre une session
require __DIR__ . '/session.php';
// On inclut la connexion à la base
require __DIR__ . '/connect.php';

mb_internal_encoding("UTF-8");
// Je crée une fonction pour tous mettre en minuscule sauf la 1er lettre en majuscule
function mb_ucfirst($string)
{
    $string = mb_strtolower($string);
    return mb_strtoupper(mb_substr($string, 0, 1)) . mb_substr($string, 1);
}
if (empty($_POST['nom'])) {
    $_SESSION['erreur'] = "Merci de rentrer un nom d'Argonaute";
} elseif (preg_match('/[0-9 & @ # ² ` ¤ £ § _ \- < > : ! ; , & % ° \. \* \? \+ \[ \( \) \{ \} \^ \$ \| \] \/ ]/', $_POST['nom'])) {
    $_SESSION['erreur'] = "Aucun Argonaute ne possède de symbole ou de chiffre dans son nom";
} elseif (strlen($_POST['nom'])  < 3) {
    $_SESSION['erreur'] = "Aucun Argonaute ne possède un nom si court";
} elseif (strlen($_POST['nom'])  > 48) {
    $_SESSION['erreur'] = "Aucun Argonaute ne possède un nom si long";
} else {
    // On nettoie les données envoyées
    $nom = htmlentities(mb_ucfirst(trim($_POST['nom'])), ENT_QUOTES);

    $sql = 'INSERT INTO `argonaute` (`nom`) VALUES (:nom);';

    $query = $db->prepare($sql);

    $results = $query->bindValue(':nom', $nom, PDO::PARAM_STR);

    $query->execute();

    $_SESSION['message'] = "Argonaute ajouté";
}
header('Location: index.php');
