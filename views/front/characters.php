<?php
include_once 'models/Character.php';
$newCharacter = new Character();
$userCharacters = $newCharacter->getCharacterByUser($_SESSION['id']);
include_once 'models/Classes.php';
?>
<div class="homeMain">
<h1>Personnage</h1>

<a href="index.php?view=front/create-character"><button>Créer un personnage</button></a>

<div class="charList">
<?php foreach($userCharacters as $character): ?>
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
              <p><?= $className['name'] ?> - <?= $character['age'] ?> ans</p>
            </div>
            <div class="charButtons">
            <a href="index.php?view=front/character&id=<?= $character['id'] ?>"><button class="loginBtn">détails</button></a><a href="index.php?view=front/update-character&id=<?= $character['id'] ?>"><button class="createBtn">modifier</button
              ></a><a href="handlers/delete-character.php?id=<?= $character['id'] ?>"><button class="headerBtn">supprimer</button></a>
            </div>
          </div>
        </div>    
<?php  endforeach; ?>
</div>