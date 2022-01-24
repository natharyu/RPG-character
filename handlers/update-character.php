<?php

include_once '../models/Character.php';


try
{
    if (isset ( $_GET['id']) && !empty($_GET['id']) &&
    isset ( $_POST['pseudo']) && !empty($_POST['pseudo']) &&
    isset ( $_POST['classe']) && !empty($_POST['classe']) &&
    isset ( $_POST['age']) && !empty($_POST['age']))
    {
        $newCharacter = new Character();
        $character = $newCharacter->getCharacterById($_GET['id']);

        $newCharacterData = [
            'pseudo'=>$_POST['pseudo'],
            'classe'=>$_POST['classe'],
            'age'=>$_POST['age'],];
        $newCharacter->updateCharacter($newCharacterData, $_GET['id']);
        
        header( 'Location: ../index.php?view=front/characters');
        exit();
    }

    else
    {
        throw new Exception('Tous les champs sont obligatoires.');
    }
}
catch(Exception $e){
    header('Location: ../index.php?view=front/characters&error=' . $e->getMessage() );
    exit();
}

?>