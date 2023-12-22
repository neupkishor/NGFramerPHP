<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AccountContact extends FoundationModel
{
    protected string $tableName = 'account_contact';
    protected array $fields = ['id', 'accountId', 'detail'];
    protected array $data = ['id' => null, 'accountId' => null, 'detail' => null];
    protected array $insertableFields = ['accountId', 'detail'];
    protected array $editableFields = ['detail'];
    protected array $rules = [];
    protected array $errors = [];
}