<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AuthOtp extends FoundationModel
{
    protected string $tableName = 'auth_otp';
    protected array $fields = ['accountId', 'type', 'tokenKey'];
    protected array $data = ['accountId' => null, 'type' => null, 'tokenKey' => null];
    protected array $insertableFields = ['accountId', 'type', 'tokenKey'];
    protected array $editableFields = ['tokenKey'];
    protected array $rules = [];
    protected array $errors = [];
}
