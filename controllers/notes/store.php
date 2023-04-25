<?php

use Core\Validator;
use Core\App;

$db = App::resolve(\Core\Database::class);

$errors = [];

if (!Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body can not be more than 1,000 characters.';
}

if (!empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('INSERT INTO notes(body, users_id) VALUES (:body, :users_id)', [
    'body' => $_POST['body'],
    'users_id' => 1
]);

header('location: /php_laracast/notes');
exit();
