<?php

namespace ngframerphp\model\schema;

use ngframerphp\core\Model;

final class AuthSession extends Model
{
	protected string $tableName = 'auth_session';
	protected array $fields = ['id', 'accountId', 'sessionKey', 'ipAddress', 'userAgent', 'isExpired', 'expiresOn', 'lastLoggedIn', 'loginType', 'loginDetail'];
	protected array $data = ['id' => null, 'accountId' => null, 'sessionKey' => null, 'ipAddress' => null, 'userAgent' => null, 'isExpired' => null, 'expiresOn' => null, 'lastLoggedIn' => null, 'loginType' => null, 'loginDetail' => null];
	protected array $insertableFields = ['accountId', 'sessionKey', 'ipAddress', 'userAgent', 'isExpired', 'expiresOn', 'lastLoggedIn', 'loginType', 'loginDetail'];
	protected array $editableFields = ['ipAddress', 'userAgent', 'isExpired', 'expiresOn', 'lastLoggedIn', 'loginDetail'];
	protected array $rules = [
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
	protected array $errors = [];
}
