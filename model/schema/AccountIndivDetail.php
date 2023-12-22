<?php

namespace ngframerphp\model\schema;

use ngframerphp\model\base\FoundationModel;

final class AccountIndivDetail extends FoundationModel
{
    protected string $tableName = 'account__indiv_detail';
    protected array $fields = ['accountId', 'firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
    protected array $data = ['accountId' => null, 'firstName' => null, 'middleName' => null, 'lastName' => null, 'gender' => null, 'birthDate' => null];
    protected array $insertableFields = ['accountId', 'firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
    protected array $editableFields = ['firstName', 'middleName', 'lastName', 'gender', 'birthDate'];
    protected array $rules = [
        'firstName' => [self::RULE__REQUIRED, self::RULE_NAME__VALID],
        'lastName' => [self::RULE__REQUIRED, self::RULE_NAME__VALID],
        'gender' => [self::RULE__REQUIRED, self::RULE_GENDER__VALID],
        'birthDate' => [self::RULE__REQUIRED, self::RULE_DATE__VALID, self::RULE_BIRTHDATE__VALID, self::RULE_AGE__DEPENDENT]
    ];
    protected array $errors = [];
}
