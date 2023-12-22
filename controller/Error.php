<?php

namespace ngframerphp\controller;

use ngframerphp\core\Controller;

class Error extends Controller
{

	public function index()
	{
		$this->renderView('main', 'error', []);
	}

}