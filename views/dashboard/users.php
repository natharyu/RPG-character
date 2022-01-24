<?php

include_once 'models/User.php';

$newUser = new User();
$users = $newUser->getAllUsers();

?>

<div class="homeMain">
<h1>Tous les utilisateurs</h1>

<table class="table">
    <thead>
        <tr>
            <th>Utilisateur</th>
            <th>Role</th>
        </tr>
    </thead>
    <tbody>

<?php foreach( $users as $user ) : ?>

    <tr>
        <td class="tableUser">
            <a href="index.php?view=dashboard/user&id=<?= $user['id'] ?>"><?= $user['username'] ?></a>
        </td>
        <td>
            <?= $user['role'] ?>
        </td>
    </tr>
    

<?php endforeach; ?>

    </tbody>
</table>
</div>