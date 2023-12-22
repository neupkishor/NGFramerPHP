<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AccountDetail extends FoundationModel
{
	protected string $tableName = 'account_detail';
	protected array $fields = ['accountId', 'displayName', 'displayImage'];
	protected array $data = ['accountId' => null, 'displayName' => null, 'displayImage' => null];
	protected array $insertableFields = ['displayName', 'displayImage'];
	protected array $editableFields = ['displayName', 'displayImage'];
	protected array $rules = [
		'displayImage' => [self::RULE_DISPLAYIMAGE__VALID]
	];
	protected array $errors = [];
}
