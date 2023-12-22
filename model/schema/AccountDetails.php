<?php

namespace ngframerphp\model\schema;

use ngframer\model\base\ModelFoundation;

class AccountDetail extends ModelFoundation
{
	private array $data = ['accountId' => null, 'displayName' => null, 'displayImage' => null];

	private string $tableName = 'account_detail';
	private array $fields = ['accountId', 'displayName', 'displayImage'];
	private array $insertableFields = ['displayName', 'displayImage'];
	private array $editableFields = ['displayName', 'displayImage'];
	private array $rules = [
		'displayImage' => [self::RULE_DISPLAYIMAGE__VALID]
	];
	private array $errors = [];
}
