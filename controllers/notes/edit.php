<?php

use Core\App;

$db = App::resolve(\Core\Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_GET['id']
])->findOrFail();

authorize($note['users_id'] === $currentUserId);

view('notes/edit.view.php', [
    'heading' => 'Edit Notes',
    'errors' => [],
    'note' => $note
]);