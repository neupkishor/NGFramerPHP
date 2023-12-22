<?php

namespace ngframerphp\controller;

use ngframerphp\core\Controller;

class Index extends Controller
{
	public function index()
	{
		$this->renderView('main', 'index');
	}
}
