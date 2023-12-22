<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AuthCredential extends FoundationModel
{
	protected string $tableName = 'auth_credential';
	protected array $fields = ['accountId', 'password', 'secondAuth'];
	protected array $data = ['accountId' => null, 'password' => null, 'secondAuth' => null];
	protected array $insertableFields = ['accountId', 'password', 'secondAuth'];
	protected array $editableFields = ['password', 'secondAuth'];
	protected array $rules = [
		'password' => [self::RULE_PASSWORD__MIN, self::RULE_PASSWORD__MAX, self::RULE_PASSWORD__MATCH],
		'secondAuth' => [self::RULE_AGREEMENT__ACCEPTED]
	];
	protected array $errors = [];
}