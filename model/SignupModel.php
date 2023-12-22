<?php

namespace ngframerphp\model;

use ngframer\model\base\ModelAdvance;
use ngframerphp\utility\UtilCommon;
use ngframerphp\model\schema\{AccountType, AccountDetail, AccountNeupid, AccountIndivDetail, AuthCredential, AuthOtp, AuthSession};

class SignupModel extends ModelAdvance
{
	private array $fields = ['neupId', 'password', 'otpCode'];
	private array $rules = [
		'firstName' => [self::RULE__REQUIRED],
		'middleName' => [],
		'lastName' => [self::RULE__REQUIRED]
	];
	private array $errors = [];

	// Class variables for the database table.
	private $accountType;
	private $accountNeupid;
	private $accountDetail;
	private $accountIndivDetail;
	private $authCredential;
	private $authOtp;
	private $authSession;

	// Initialize the class variables of database table.
	public function __construct()
	{
		$this->accountType = new AccountType();
		$this->accountNeupid = new AccountNeupid;
		$this->accountDetail = new AccountDetail;
		$this->accountIndivDetail = new AccountIndivDetail;
		$this->authCredential = new AuthCredential;
		$this->authOtp = new AuthOtp;
		$this->authSession = new AuthSession;
	}

	// Function required for Signing Up the user.
	// Create a function that would then upon the creation of account, create a model for generating the session and then sending the session to the user.
	public function signup()
	{
		$data = [
			"type" => "random"
		];
		$this->accountType->loadData($data);
		echo json_encode($this->accountType->$data);
		echo json_encode($this->accountType->getErrors());


		echo json_encode(UtilCommon::mergeArray($this->errors, $this->accountType->getErrors()));
	}
}
