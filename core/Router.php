<?php

namespace ngframerphp\core;

use ngframerphp\core\{Request, Response};

class Router
{
	public Request $request;
	public Response $response;
	protected array $routes = [];


	public function __construct(Request $request, Response $response)
	{
		$this->request = $request;
		$this->response = $response;
	}


	// Function to determine callback (function, controller's function) for specific path and method.
	public function mapRoute($method, $path, $callback): void
    {
		// Create array with 'get' key.
		$this->routes[$method][$path] = $callback;
	}


	// Function determining URL path, and method, and execute the callback.
	public function handleRoute(): void
    {
		$path = $this->request->getPath();
		$method = $this->request->getMethod();

		// Determine the callback associated with the requested path and method.
		if (isset($this->routes[$method][$path])) {
			$callback = $this->routes[$method][$path];
			
			// Check if a valid callback exists, is string, and is callable.
			// Only possible for functions not in any class.
			if ($callback && is_string($callback)) {
				if (is_callable($callback)) {
					call_user_func($callback);
				} else {
					$this->doErrorCallback();
				}
			}
			
			// Check if a valid callback exists, is array, and if it's callable.
			else if ($callback && is_array($callback)) {
				$callback[0] = new $callback[0];
				if (is_callable($callback)) {
					call_user_func($callback);
				} else {
					$this->doErrorCallback();
				}
			} else {
				$this->doErrorCallback();
			}
		}
	}

	
	// Used only for error callback by handleRoute() method.
	private function doErrorCallback(): void
    {
		$callback = $this->routes['get']['/error'];
		$callback[0] = new $callback[0];
		call_user_func($callback);
	}
}
