<?php

namespace ngframerphp\model;

use ngframerphp\model\base\AdvanceModel;
use ngframerphp\model\schema\{AccountType, AccountDetail, AccountNeupid, AccountIndivDetail, AuthCredential, AuthOtp, AuthSession};

final class SignupModel extends AdvanceModel
{
	protected array $fields = ['firstName', 'middleName', 'lastName'];
	protected array $data = ['firstName' => null, 'middleName' => null, 'lastName' => null];
	protected array $rules = [
		'firstName' => [self::RULE__REQUIRED],
		'middleName' => [],
		'lastName' => [self::RULE__REQUIRED]
	];
	protected array $errors = [];

	// Class variables for the database table.
	private AccountType $accountType;
	private AccountNeupid $accountNeupid;
	private AccountDetail $accountDetail;
	private AccountIndivDetail $accountIndivDetail;
	private AuthCredential $authCredential;
	private AuthOtp $authOtp;
	private AuthSession $authSession;

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
}
