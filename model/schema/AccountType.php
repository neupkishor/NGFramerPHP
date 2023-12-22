<?php

namespace ngframerphp\model\schema;

use ngframer\model\base\ModelFoundation;

class AccountType extends ModelFoundation
{
	private array $data = ['accountId' => null, 'type' => null];

	private string $tableName = 'account_type';
	private array $fields = ['accountId', 'type'];
	private array $insertableFields = ['type'];
	private array $editableFields = ['type'];
	private array $rules = [
		'type' => [self::RULE_NAME__VALID]
	];
	private array $errors = [];
}
