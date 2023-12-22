<?php

namespace ngframerphp\controller;

use ngframerphp\core\Controller;
use ngframerphp\model\SignupModel;

class Signup extends Controller
{



	public function index(): void
    {
		if ($this->isMethodGet()) {
			echo $this->renderView('main', 'signup');
		}
		elseif ($this->isMethodPost()) {
			$this->processSignup();
		}
	}


	public function processSignup(): void
    {
		$signupModel = new SignupModel;
		$signupModel->loadData($_POST);
		$signupModel->validate();
		$contentParam = ($signupModel->getErrors());

	}
}