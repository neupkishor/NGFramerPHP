<?php

namespace ngframerphp\core;

class Request
{

	// Returns the path, the user is trying to access.
	public function getPath()
	{
		// Get the URI from the $_SERVER superglobal.
		$uri = $_SERVER['REQUEST_URI'] ?? '/';
		// Use the parse_url to get the contents of the URL/URI.
		$path = parse_url($uri)['path'];
		return $path;
	}

	// Returns the method the User is trying to access.
	public function getMethod()
	{
		return strtolower($_SERVER['REQUEST_METHOD']);
	}


	// Returns if the method the User is trying to access is get.
	public function isMethodGet()
	{
		return $this->getMethod() === 'get';
	}

	// Returns if the method the User is trying to access is post.
	public function isMethodPost()
	{
		return $this->getMethod() === 'post';
	}


	// Returns the data the user is trying to pass us.
	public function getBody()
	{
		// Initialize an empty array $data.
		$data = [];
		// Check for the GET method of sending data.
		if ($this->isMethodGet()) {
			foreach ($_GET as $key => $value){
				$data[$key] = filter_input(INPUT_GET, $key, FILTER_SANITIZE_SPECIAL_CHARS);
			}
		}			
		// Check for the POST method of sending data.
		elseif($this->isMethodPost()){
			foreach ($_POST as $key => $value){
				$data[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
			}
		}
		// Return the sanitized data.
		return $data;
	}



	

}
