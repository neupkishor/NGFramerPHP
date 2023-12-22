<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AccountBrandDetail extends FoundationModel
{
    protected string $tableName = 'account__brand_detail';
    protected array $fields = ['accountId', 'legalName'];
    protected array $data = ['accountId' => null, 'legalName' => null];
    protected array $insertableFields = ['accountId', 'legalName'];
    protected array $editableFields = ['legalName'];
    protected array $rules = [];
    protected array $errors = [];
}