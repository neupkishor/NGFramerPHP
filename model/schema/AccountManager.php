<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AccountManager extends FoundationModel
{
    protected string $tableName = 'account_manager';
    protected array $fields = ['id', 'accountId', 'managingAccount', 'permission'];
    protected array $data = ['id' => null, 'accountId' => null, 'managingAccount' => null, 'permission' => null];
    protected array $insertableFields = ['accountId', 'managingAccount', 'permission'];
    protected array $editableFields = ['permission'];
    protected array $rules = [];
    protected array $errors = [];
}
