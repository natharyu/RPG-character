<?php
include_once 'models/Character.php';
$newCharacter = new Character();
$userCharacters = $newCharacter->getCharacter();
include_once 'models/Classes.php';
include_once 'models/User.php';

?>
<div class="homeMain">
<h1>Tous les personnages</h1>

<?php foreach($userCharacters as $character): ?>
<?php
        $class = new classList();
        $className = $class->getNameClass($character['classe']);
        ?>

    <div class="dashboardByCharacter">
        <div>
            <p>Nom du perosnnage : <?= $character['pseudo'] ?></p>
            <p>Classe du personnage : <?= $className['name'] ?></p>
            <p>Age du personnage : <?= $character['age'] ?> ans</p>

            <?php $newUser = new User();
                $user = $newUser->getOneUserById($character['user']);
            ?>
            
            <p>Utilisateur : <a href="index.php?view=dashboard/user&id=<?= $character['user'] ?>"> <?= $user['username'] ?> </a></p>
        </div>
        <div class="charButtons">
            <a href="index.php?view=dashboard/character&id=<?= $character['id'] ?>"><button class="loginBtn">Détails du personnage</button</a>
            <a href="index.php?view=dashboard/update-character&id=<?= $character['id'] ?>"><button class="createBtn">Modifier ce personnage</button></a>
            <a href="handlers/delete-character.php?id=<?= $character['id'] ?>"><button class="headerBtn">Supprimer ce personnage</button></a>
        </div>
    </div>

<?php  endforeach; ?>
</div>