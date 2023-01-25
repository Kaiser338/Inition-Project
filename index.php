<?php

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url($path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('register', 'SecurityController');
Router::post('registerForm', 'SecurityController');
Router::post('login', 'SecurityController');
Router::post('logout', 'SecurityController');

Router::get('tasks', 'TaskController');
Router::get('searchTask', 'TaskController');
Router::get('newTask', 'TaskController');
Router::post('createTask', 'TaskController');
Router::post('changeTask', 'TaskController');

Router::get('admin', 'AdminController');

Router::run($path);

?>