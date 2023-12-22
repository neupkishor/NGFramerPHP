<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AccountType extends FoundationModel
{
	protected string $tableName = 'account_type';
	protected array $fields = ['accountId', 'type'];
	protected array $data = ['accountId' => null, 'type' => null];
	protected array $insertableFields = ['type'];
	protected array $editableFields = ['type'];
	protected array $rules = [
		'type' => [self::RULE_NAME__VALID]
	];
	protected array $errors = [];
}
