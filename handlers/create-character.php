<?php
session_start();
include_once '../models/Character.php';


try
{
    if( isset( $_SESSION['id'] ) && !empty( $_SESSION['id'] )&&
    isset( $_POST['pseudo'] ) && !empty( $_POST['pseudo'] ) && 
    isset( $_POST['classe'] ) && !empty( $_POST['classe'] ) &&
    isset( $_POST['age'] ) && !empty( $_POST['age'] ) )
    {
        $userChar = new Character();
        $userChar->addCharacter( [$_SESSION['id'], $_POST['pseudo'], $_POST['classe'], $_POST['age']]);

        header('Location: ../index.php?view=front/characters');
        exit();
    }
    else
    {
        throw new Exception ( 'Tous les champs doivent être renseignés !' );
    }
}
catch( Exception $e)
{
    header('Location: ../index.php?view=front/create-character&error=' . $e->getMessage() );
    exit();
}