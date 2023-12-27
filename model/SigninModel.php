<?php

namespace ngframerphp\model;

use ngframerphp\model\base\AdvanceModel;
use ngframerphp\model\schema\{AccountDetail, AccountType, AccountNeupid, AccountIndivDetail, AuthCredential, AuthOtp, AuthSession};

final class SigninModel extends AdvanceModel
{
	protected array $fields = ['neupId', 'password', 'otpCode'];
    protected array $data = ['neupId' => null, 'password'=> null, 'otpCode'=> null];
    protected array $rules = [
		'neupId' => [self::RULE__REQUIRED, self::RULE_NEUPID__NOT_RESERVED],
		'password' => [self::RULE__REQUIRED],
		'otpCode' => []
	];
	protected array $errors = [];


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
		$this->accountNeupid = new AccountNeupid();
        $this->accountDetail = new AccountDetail();
		$this->accountIndivDetail = new AccountIndivDetail();
		$this->authCredential = new AuthCredential();
		$this->authOtp = new AuthOtp();
		$this->authSession = new AuthSession();
	}
}
