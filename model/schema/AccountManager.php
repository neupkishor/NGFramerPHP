<?php

namespace ngframer\model\schema;

use ngframer\model\base\ModelFoundation;

class AccountManager extends ModelFoundation
{
    private array $data = ['id' => null, 'accountId' => null, 'managingAccount' => null, 'permission' => null];

    private string $tableName = 'account_manager';
    private array $fields = ['id', 'accountId', 'managingAccount', 'permission'];
    private array $insertableFields = ['accountId', 'managingAccount', 'permission'];
    private array $editableFields = ['permission'];
    private array $rules = [];
    private array $errors = [];
}
