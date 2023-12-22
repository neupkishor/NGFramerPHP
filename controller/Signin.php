<?php

namespace ngframerphp\controller;

use ngframerphp\core\Controller;
use ngframerphp\model\SigninModel;
use ngframerphp\utility\UtilCommon;

class Signin extends Controller
{
	public function index(): void
    {
		if ($this->isMethodGet())
        {
            $data['neupId'] = "neupkishor";
            $data['password'] = "Iamkishor";
			echo $this->renderView('main', 'signin', $data);
		}
        elseif ($this->isMethodPost())
        {
			$this->processSignin();
		}
	}


	public function processSignin(): void
    {
        $signinModel = new SigninModel();
        $signinModel -> loadData($_POST);
        $signinModel -> validate();

        $errors = UtilCommon::changeArrayKey('error', $signinModel->getErrors());
        $data = UtilCommon::mergeArray($errors);

        echo $this->renderView('main', 'signin', $data);
	}
}