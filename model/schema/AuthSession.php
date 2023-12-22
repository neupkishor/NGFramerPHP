<?php

namespace ngframerphp\model\schema;

use ngframerphp\core\Model;

class AuthSession extends Model
{
	private array $data = ['id' => null, 'accountId' => null, 'sessionKey' => null, 'ipAddress' => null, 'userAgent' => null, 'isExpired' => null, 'expiresOn' => null, 'lastLoggedIn' => null, 'loginType' => null, 'loginDetail' => null];
	private string $tableName = 'auth_session';
	private array $tableFields = ['id', 'accountId', 'sessionKey', 'ipAddress', 'userAgent', 'isExpired', 'expiresOn', 'lastLoggedIn', 'loginType', 'loginDetail'];
	private array $insertableFields = ['accountId', 'sessionKey', 'ipAddress', 'userAgent', 'isExpired', 'expiresOn', 'lastLoggedIn', 'loginType', 'loginDetail'];
	private array $editableFields = ['ipAddress', 'userAgent', 'isExpired', 'expiresOn', 'lastLoggedIn', 'loginDetail'];
	private array $rules = [
		'id' => [self::RULE_ID__NULL],
		'accountId' => [self::RULE__REQUIRED, self::RULE_ACCOUNTID__NOT_NULL, self::RULE_ACCOUNTID__INTEGER],
		'sessionKey' => [self::RULE__REQUIRED],
		'ipAddress' => [self::RULE__REQUIRED],
		'userAgent' => [self::RULE__REQUIRED],
		'isExpired' => [self::RULE__REQUIRED],
		'expiresOn' => [self::RULE__REQUIRED],
		'lastLoggedIn' => [self::RULE__REQUIRED],
		'loginType' => [self::RULE__REQUIRED],
		'loginDetail' => [self::RULE__REQUIRED],
	];
	private array $errors = [];
}
