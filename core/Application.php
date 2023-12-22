<?php

namespace ngframerphp\core;

use ngframerphp\core\{database\Connection};

class Application
{
	// Initialization of the variables used across the application.
	// The flow of the application is: Application starts, Request, Router, Controller, Database, and finally Response.
	public static Application $application;
	public Request $request;
	public Router $router;
	public Controller $controller;
	public Connection $database;
	public Response $response;


	// Instantiation of the __construct function.
	public function __construct()
	{
		self::$application = $this;
		$this->request = new Request();
		$this->router = new Router($this->request);
		$this->controller = new Controller();
        $this->database = new Connection();
		$this->response = new Response();

	}


	// Run the application by first looking are the request.
	public function run(): void
    {
		$this->router->handleRoute();
	}
}
