<?php

namespace ngframerphp\controller;

use ngframerphp\core\Controller;

class Index extends Controller
{
	public function index(): void
    {
		echo $this->renderView('main', 'index');
	}
}
