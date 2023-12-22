<?php

// Load the autoloader and use namespace.
require_once  __DIR__ . '/../config/application.php';
require_once  __DIR__ . '/../vendor/autoload.php';

// Start using the namespace.
use ngframerphp\core\Application;

// Instantiate the application.
$application = new Application();

// Start the routing process.
$application->router->mapRoute('get', '/', [ngframerphp\controller\Index::class, 'index']);
$application->router->mapRoute('post', '/', [ngframerphp\controller\Index::class, 'index']);
$application->router->mapRoute('get', '/home', [ngframerphp\controller\Home::class, 'index']);
$application->router->mapRoute('get', '/error', [ngframerphp\controller\Error::class, 'index']);
$application->router->mapRoute('get', '/signup', [ngframerphp\controller\Signup::class, 'index']);
$application->router->mapRoute('post', '/signup', [ngframerphp\controller\Signup::class, 'index']);
$application->router->mapRoute('get', '/signin', [ngframerphp\controller\Signin::class, 'index']);
$application->router->mapRoute('post', '/signin', [ngframerphp\controller\Signin::class, 'index']);

// Now, run the application.
$application->run();