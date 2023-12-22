<?php

namespace ngframerphp\model\schema;

use ngframer\model\base\ModelFoundation;

class AuthOtp extends ModelFoundation
{
    private array $data = ['accountId' => null, 'type' => null, 'tokenKey' => null];

    private string $tableName = 'auth_otp';
    private array $fields = ['accountId', 'type', 'tokenKey'];
    private array $insertableFields = ['accountId', 'type', 'tokenKey'];
    private array $editableFields = ['tokenKey'];
    private array $rules = [];
    private array $errors = [];
}
