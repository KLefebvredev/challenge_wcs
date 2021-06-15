<?php


require __DIR__ . '/session.php';
require __DIR__ . '/header.php';

require_once('connect.php');
require_once('equipage.php');
?>
<main>
    <?php
    if (!empty($_SESSION['erreur'])) {
        echo '<div class="alert alert-danger mt-4 text-center m-auto w-25" role="alert">
                        ' . $_SESSION['erreur'] . '
                        </div>';
        unset($_SESSION['erreur']);
    } elseif (!empty($_SESSION['message'])) {
        echo '<div class="alert alert-success mt-4 text-center m-auto w-25" role="alert">
                        ' . $_SESSION['message'] . '
                        </div>';
        unset($_SESSION['message']);
    }
    ?>
    </div>
    <!-- New member form -->
    <h2 class="text-center mt-4 pb-2">Ajouter un(e) Argonaute</h2>
    <form class="new-member-form text-center mt-3 mb-4" method="POST" action="add.php">
        <label class="mb-2 d-block" for="nom">Nom de l&apos;Argonaute</label>
        <input id="nom" name="nom" type="text" placeholder="Rentrez un nom" />
        <button type="submit">Envoyer</button>
    </form>
    <!-- Member list -->
    <h2 class="text-center pb-2">Membres de l'équipage</h2>
    <div class="container">
        <section class="member-list row justify-content-start text-center mb-5 p-2">
            <?php
            foreach ($result as $argonaute) {
            ?>
                <div class="member-item col-4 pt-2 pb-2"><?= $argonaute['nom'] ?></div>
            <?php
            }
            ?>
        </section>
    </div>
</main>

<?php
require __DIR__ . '/footer.php';
?>