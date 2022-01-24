<?php
include_once 'models/Classes.php';
$newClass = new classList();
$classes = $newClass->getClasses();
?>
<div id="create">
<div class="homeMain mainCreate">
    

        <h1>Créer un personnage</h1>
        <form action="./handlers/create-character.php" method="POST">
          <input type="text" name="pseudo" placeholder="Pseudo" />

          <select name="classe">

            <?php foreach($classes as $classe): ?>
                <option value="<?= $classe['id'] ?>"><?= $classe['name']?> </option>
            <?php endforeach; ?>

            </select>

          <input type="text" name="age" placeholder="age" />
          <button type="submit" class="createBtn">Créer</button>
          
          <?php if( isset( $_GET['error'] ) ) : ?>
            <p><?= $_GET['error'] ?></p>
          <?php endif; ?>
          </form>
    </div>
</div>