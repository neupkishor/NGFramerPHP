<?php

namespace ngframerphp\model\schema;

use ngframer\model\base\ModelFoundation;

class AccountBrandDetail extends ModelFoundation
{
    private array $data = ['accountId' => null, 'legalName' => null];

    private string $tableName = 'account__brand_detail';
    private array $fields = ['accountId', 'legalName'];
    private array $insertableFields = ['accountId', 'legalName'];
    private array $editableFields = ['legalName'];
    private array $rules = [];
    private array $errors = [];
}