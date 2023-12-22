<?php

namespace ngframerphp\core;

use ngframerphp\core\{Request, Router, Response, Controller};

class Application
{
	// Initialization of the variables used across the application.
	public static Application $application;
	public Request $request;
	public Router $router;
	public Response $response;
	public Controller $controller;


	// Instantiation of the __construct function.
	public function __construct()
	{
		self::$application = $this;
		$this->request = new Request();
		$this->response = new Response();
		// Pass the request to be handelled by the Router (constructor).
		$this->router = new Router($this->request, $this->response);
		// Create a controller here so to use from the $application.
		$this->controller = new Controller();
	}

	// Run the application by first looking are the request.
	public function run()
	{
		$this->router->handleRoute();
	}
}
