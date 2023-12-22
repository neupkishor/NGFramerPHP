<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AccountDependentDetail extends FoundationModel
{
	protected string $tableName = 'account__dependent_detail';
	protected array $fields = ['accountId', 'firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
	protected array $data = ['accountId' => null, 'firstName' => null, 'middleName' => null, 'lastName' => null, 'gender' => null, 'birthDate' => null];
	protected array $insertableFields = ['accountId', 'firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
	protected array $editableFields = ['firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
	protected array $rules = [
		'accountId' => [self::RULE__REQUIRED, self::RULE_ACCOUNTID__NOT_NULL, self::RULE_ACCOUNTID__INTEGER],
		'firstName' => [self::RULE__REQUIRED, self::RULE_NAME__VALID],
		'middleName' => [self::RULE_NAME__VALID],
		'lastName' => [self::RULE__REQUIRED, self::RULE_NAME__VALID],
		'gender' => [self::RULE__REQUIRED, self::RULE_GENDER__VALID],
		'birthDate' => [self::RULE__REQUIRED, self::RULE_DATE__VALID, self::RULE_BIRTHDATE__VALID, self::RULE_AGE__DEPENDENT]
	];
	protected array $errors = [];
}