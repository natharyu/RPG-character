<?php
include_once 'models/User.php';
    $newUser = new User();
    $user = $newUser->getOneUserById($_SESSION['id']);
    
include_once 'models/Character.php';
    $newCharacter = new Character();
    $character = $newCharacter->getCharacterById($_GET['id']);

include_once 'models/Classes.php';
    $newClasses = new ClassList();
    $classes = $newClasses->getClasses();
?>
<div class="homeMain">
<h1>Modifier mon personnage</h1>

<form action="handlers/update-character.php?id=<?= $character['id'] ?>" method="POST">

    <input type="hidden" value="<?= $_SESSION["id"] ?>">
    <input type="hidden" value="<?= $_SESSION["username"] ?>"> 
    <input type="text" name="pseudo" value="<?= $character['pseudo']?>">
    <select name="classe">
        <?php foreach($classes as $classe) : ?>

            <option value="<?= $classe['id'] ?>"<?php if( $classe['id'] === $character['classe'] ) {echo 'selected';} ?>>
                <?= $classe['name'] ?>
            </option>

        <?php endforeach; ?>
    </select>
    <input type="number" name="age" value="<?= $character['age']?>">
    <button type="submit">Modifier</button>
</form>
</div>