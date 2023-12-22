<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AccountNeupId extends FoundationModel
{
    protected string $tableName = 'account_neupid';
    protected array $fields = ['id', 'neupId', 'accountId'];
    protected array $data = ['id' => null, 'neupId' => null, 'accountId' => null];
    protected array $insertableFields = ['neupId', 'accountId'];
    protected array $editableFields = ['neupId'];
    protected array $rules = [
        'neupId' => [self::RULE_NAME__VALID, self::RULE_NEUPID__UNIQUE, self::RULE_NEUPID__NOT_RESERVED]
    ];
    protected array $errors = [];
}
