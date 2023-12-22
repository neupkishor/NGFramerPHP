<?php

namespace ngframerphp\controller;

use ngframerphp\core\Controller;

class Home extends Controller
{
	public function index()
	{
		$this->renderView('main', 'home');
	}
}
