<?php

use Core\App;

$db = App::resolve(\Core\Database::class);

$heading = 'My Notes';

$notes = $db->query("SELECT * FROM notes WHERE users_id = 1")->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes
]);
