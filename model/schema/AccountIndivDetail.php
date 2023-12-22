<?php

namespace ngframerphp\model\schema;

use ngframer\model\base\ModelFoundation;

class AccountIndivDetail extends ModelFoundation
{
    private array $data = ['accountId' => null, 'firstName' => null, 'middleName' => null, 'lastName' => null, 'gender' => null, 'birthDate' => null];

    private string $tableName = 'account__indiv_detail';
    private array $fields = ['accountId', 'firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
    private array $insertableFields = ['accountId', 'firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
    private array $editableFields = ['firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
    private array $rules = [
        'firstName' => [self::RULE__REQUIRED, self::RULE_NAME__VALID],
        'lastName' => [self::RULE__REQUIRED, self::RULE_NAME__VALID],
        'gender' => [self::RULE__REQUIRED, self::RULE_GENDER__VALID],
        'birthDate' => [self::RULE__REQUIRED, self::RULE_DATE__VALID, self::RULE_BIRTHDATE__VALID, self::RULE_AGE__DEPENDENT]
    ];
    private array $errors = [];
}
