<?php

namespace ngframerphp\model\schema;

use ngframer\model\base\ModelFoundation;

class AccountNeupId extends ModelFoundation
{
    private array $data = ['id' => null, 'neupId' => null, 'accountId' => null];

    private string $tableName = 'account_neupid';
    private array $fields = ['id', 'neupId', 'accountId'];
    private array $insertableFields = ['neupId', 'accountId'];
    private array $editableFields = ['neupId'];
    private array $rules = [
        'neupId' => [self::RULE_NAME__VALID, self::RULE_NEUPID__UNIQUE, self::RULE_NEUPID__NOT_RESERVED]
    ];
    private array $errors = [];
}
