<?php

require_once "vendor/autoload.php";

session_start();


$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $r) {
    $r->addRoute('GET', '/tasks', 'TasksController@showTasks');
    $r->addRoute('POST', '/tasks', 'TasksController@addNewTask');
    $r->addRoute('GET', '/tasks/searchResults', 'TasksController@searchTask');
    $r->addRoute('POST', '/tasks/searchResults', 'TasksController@deleteTask');

    $r->addRoute('POST', '/registration', 'UsersController@addUser');
    $r->addRoute('GET', '/registration', 'UsersController@registrationForm');
    $r->addRoute('POST', '/signin', 'UsersController@signInUser');
    $r->addRoute('GET', '/signin', 'UsersController@signInForm');
    $r->addRoute('GET', '/welcome', 'UsersController@signInSuccessful');
    $r->addRoute('GET', '/user', 'UsersController@userInfo');
    $r->addRoute('POST', '/user', 'UsersController@signOut');


});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];
        [$handler, $method] = explode("@", $handler);
        $path = "App\Controllers\\" . $handler;
        $controller = new $path();
        $controller->$method();
        break;
}

