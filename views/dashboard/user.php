<?php
include_once 'models/User.php';
new User();
$newUser = new User();
$user = $newUser->getOneUserById($_GET['id']);

include_once 'models/Character.php';
$newCharacter = new Character();
$userCharacters = $newCharacter->getCharacterByUser($user['id']);

include_once 'models/Classes.php';
?>

<div class="homeMain">
<p>Nom d'utilisateur : <?= $user['username'] ?></p>

<div class="charList">
<?php foreach( $userCharacters as $character ): ?>
    <?php
        $class = new classList();
        $className = $class->getNameClass($character['classe']);
        ?>

        <div class="byCharacter">
          <div class="avatarSquare">
          <img src="https://zupimages.net/up/21/48/baf3.png" alt="" />
          </div>
          <div>
            <div>
              <h2><?= $character['pseudo'] ?></h2>
              <p><?= $className['name'] ?> - <?= $character['age'] ?></p>
            </div>
            <div class="charButtons">
            <a href="index.php?view=dashboard/character&id=<?= $character['id'] ?>"><button class="loginBtn">détails</button></a><a href="index.php?view=dashboard/update-character&id=<?= $character['id'] ?>"><button class="createBtn">modifier</button
              ></a><a href="handlers/delete-character.php?id=<?= $character['id'] ?>"><button class="headerBtn">supprimer</button></a>
            </div>
          </div>
        </div> 
<?php endforeach; ?>
</div>
</div>