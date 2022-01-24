<?php
    include_once 'models/User.php';

    $newUser = new User();
    $user = $newUser->getOneUser( $_SESSION['username'] );

?>
<div class="homeMain">
    <h1>Mon compte</h1>

    <p>Bienvenue <?= $_SESSION['username'] ?>, ici vous pouvez modifier votre compte.</p>

        <?php if( isset( $_GET['success'] ) ) : ?>
            <p><?= $_GET['success'] ?></p>
        <?php endif; ?>
        
        <button class="headerBtn"><a href="index.php?view=front/update-account">Modifier mon compte</a></button>

    <?php if ($user['role'] === 'admin') :?>
        <button class="createBtn"><a href="index.php?view=dashboard/home">Administration</a></button>
    <?php endif; ?>
</div>