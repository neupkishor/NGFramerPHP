<?php

namespace ngframer\model\schema;

use ngframer\model\base\ModelFoundation;

class AuthCredential extends ModelFoundation
{
	private array $data = ['accountId' => null, 'password' => null, 'secondAuth' => null];

	private string $tableName = 'auth_credential';
	private array $fields = ['accountId', 'password', 'secondAuth'];
	private array $insertableFields = ['accountId', 'password', 'secondAuth'];
	private array $editableFields = ['password', 'secondAuth'];
	private array $rules = [
		'password' => [self::RULE_PASSWORD__MIN, self::RULE_PASSWORD__MAX, self::RULE_PASSWORD__MATCH],
		'secondAuth' => [self::RULE_AGREEMENT__ACCEPTED]
	];
	private array $errors = [];
}
