<?php

namespace ngframerphp\core;

class Controller
{
	// Instantiation of application for this whole main parent Controller class.
	public Application $application;


	// Initialization of the Application class for this whole main parent Controller class.
	public function __construct()
	{
		$this->application = Application::$application;
	}


	// Render view function for controller. Only for ease of use in Controllers.
	public function renderView($layoutView, $contentView, $contentParam = []): array|string
    {
		return $this->application->response->renderView($layoutView, $contentView, $contentParam);
	}


	// Get body function for controller. Only for ease of use in Controllers.
	public function getBody(): array
    {
		return $this->application->request->getBody();
	}


	// Get method function for controller. Only for ease of use in Controllers.
	public function getMethod(): string
    {
		return $this->application->request->getMethod();
	}


	// Is method get function for controller. Only for ease of use in controllers.
	public function isMethodGet(): bool
    {
		return $this->application->request->isMethodGet();
	}


	// Is method post function for controller. Only for ease of use in controllers.
	public function isMethodPost(): bool
    {
		return $this->application->request->isMethodPost();
	}


	// The following function converts one or more string to array, and converts multiple array to one array. Single array are not changed.
	function makeArray(...$args): array
    {
		$result = [];
		foreach ($args as $arg) {
			if (is_array($arg)) {
				$result = array_merge($result, $arg);
			} elseif (is_string($arg)) {
				if (!empty($arg)) {
					$result[] = $arg;
				}
			}
		}
		return $result;
	}
}
