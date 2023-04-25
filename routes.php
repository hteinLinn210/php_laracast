<?php

// return [
//     "/php_laracast/public/" => "controllers/index.php",
//     "/php_laracast/about" => "controllers/about.php",
//     "/php_laracast/notes" => "controllers/notes/index.php",
//     "/php_laracast/note" => "controllers/notes/show.php",
//     "/php_laracast/notes/create" => "controllers/notes/create.php",
//     "/php_laracast/contact" => "controllers/contact.php",
// ];

$router->get('/php_laracast/public/', 'controllers/index.php');
$router->get('/php_laracast/about', 'controllers/about.php');
$router->get('/php_laracast/contact', 'controllers/contact.php');

$router->get('/php_laracast/notes', 'controllers/notes/index.php');
$router->get('/php_laracast/note', 'controllers/notes/show.php');
$router->delete('/php_laracast/note', 'controllers/notes/destory.php');

$router->get('/php_laracast/note/edit', 'controllers/notes/edit.php');
$router->patch('/php_laracast/note', 'controllers/notes/update.php');

$router->get('/php_laracast/notes/create', 'controllers/notes/create.php');
$router->post('/php_laracast/notes', 'controllers/notes/store.php');
