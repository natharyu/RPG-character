<?php

include_once '../models/Character.php';

if (isset ($_GET['id']) && !empty( $_GET['id']) )
    {
        $newCharacter = new Character();
        $newCharacter->deleteCharacter($_GET['id']);
    }

header( 'Location: ../index.php?view=front/characters');
exit();

?>