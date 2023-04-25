<?php

// Find the corresponding note
use Core\App;
use Core\Validator;

$db = App::resolve(\Core\Database::class);

$currentUserId = 1;

$note = $db->query("SELECT * FROM notes WHERE id = :id", [
    "id" => $_POST['id']
])->findOrFail();
// Authenticate the user
authorize($note['users_id'] === $currentUserId);

// Form Validation
$errors = [];

if (!Validator::string($_POST['body'], 1, 10000)) {
    $errors['body'] = 'A body can not be more than 1,000 characters.';
}

// If no error, update the form
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
}

$db->query('UPDATE notes SET body = :body WHERE id = :id', [
    'body' => $_POST['body'],
    'id' => $_POST['id'],
]);

header('location: /php_laracast/notes');
die();