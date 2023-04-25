<?php

use Core\App;

$db = App::resolve(\Core\Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_POST['id']
])->findOrFail();

authorize($note['users_id'] === $currentUserId);

$db->query('DELETE FROM notes WHERE id = :id', [
    'id' => $_POST['id'],
]);

header('location: /php_laracast/notes');
exit();
