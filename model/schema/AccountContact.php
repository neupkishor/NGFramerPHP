<?php

namespace ngframer\model\schema;

use ngframer\model\base\ModelFoundation;

class AccountContact extends ModelFoundation
{
    private array $data = ['id' => null, 'accountId' => null, 'detail' => null];

    protected string $tableName = 'account_contact';
    protected array $fields = ['id', 'accountId', 'detail'];
    protected array $insertableFields = ['accountId', 'detail'];
    protected array $editableFields = ['detail'];
    protected array $rules = [];
    protected array $errors = [];
}
