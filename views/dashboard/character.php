<?php
include_once 'models/Character.php';
$newCharacter = new Character();
$character =  $newCharacter->getCharacterById($_GET['id']);

include_once 'models/Classes.php';
$newClasses = new ClassList();
$classes = $newClasses->getClasses();
?>
<div class="homeMain">
<h1>Détails du personnage</h1>

<div class="globalCharacter">
      <div class="leftCharacter">
        <img href="https://zupimages.net/viewer.php?id=21/48/8b0d.png" /><img
          src="https://zupimages.net/up/21/48/8b0d.png"
          alt="Warrior"
        />
      </div>

      <div class="rightCharacter">
        <div>
          <h2><?= $character['pseudo'] ?></h2>
          <p>
            <?php foreach($classes as $classe) : ?>

                <?php if( $classe['id'] === $character['classe'] ) {echo $classe['name'];} ?>
     
            <?php endforeach; ?>
          </p>
          <p><?= $character['age'] ?></p>

          <!-- Test de modal -->
          <button id="myBtn">Inventaire</button>

          <div id="myModal" class="modal">
            <div class="modal-content">
              <span class="close">&times;</span>
              <table>
                <tr class="header">
                  <td colspan="4">Inventory</td>
                </tr>
                <tr class="items">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="items">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="items">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr class="items">
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td></td>
                </tr>
              </table>
            </div>
          </div>
          <!-- Fin de test de modal -->
          
        </div>
      </div>
    </div>
</div>