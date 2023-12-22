<?php

namespace ngframerphp\controller;

use ngframerphp\core\Controller;
use ngframerphp\model\SignupModel;

class Signup extends Controller
{
	public function index()
	{
		if ($this->isMethodGet()) {
			$this->renderView('main', 'signup');
		}
		elseif ($this->isMethodPost()) {
			$this->processSignup();
		}
	}


	public function processSignup($data = null)
	{
		var_dump($_POST);
	}
}