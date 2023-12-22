<?php

namespace ngframerphp\core;

use ngframerphp\utility\UtilDatetime;
use ngframerphp\utility\UtilGender;
use ngframerphp\utility\UtilName;
use ngframerphp\utility\UtilNeupId;
use ngframerphp\utility\UtilPassword;
use ngframerphp\utility\UtilUrl;

abstract class Model
{
	// Properties to be extended by Model Classes.
    protected array $fields;
    protected array $data;
    protected array $rules;
    protected array $errors;


	// The rules for the data to be inserted to database.
	public const RULE__REQUIRED =  'RULE__REQUIRED';
	public const RULE_ACCOUNTID__NULL = 'RULE_ACCOUNTID__NULL';
	public const RULE_ACCOUNTID__NOT_NULL = 'RULE_ACCOUNTID__NOT_NULL';
	public const RULE_ACCOUNTID__INTEGER = 'RULE_ACCOUNTID__INTEGER';
	public const RULE_ID__NULL = 'RULE_ID__NULL ';
	public const RULE_ID__NOT_NULL = 'RULE_ID__NOT_NULL ';
	public const RULE_ID__INTEGER = 'RULE_ID__INTEGER';
	public const RULE_ACCOUNTTYPE__VALID = 'RULE_ACCOUNTTYPE__VALID';
	public const RULE_NAME__VALID = 'RULE_NAME__VALID';
	public const RULE_DISPLAYIMAGE__VALID = 'RULE_DISPLAYIMAGE__VALID';
	public const RULE_DATE__VALID = 'RULE_DATE__VALID';
	public const RULE_BIRTHDATE__REQUIRED = 'RULE_BIRTHDATE__REQUIRED';
	public const RULE_BIRTHDATE__VALID = 'RULE_BIRTHDATE__VALID';
	public const RULE_AGE__VALID = 'RULE_AGE__VALID';
	public const RULE_AGE__INDIV = 'RULE_AGE__INDIV ';
	public const RULE_AGE__DEPENDENT = 'RULE_AGE__DEPENDENT';
	public const RULE_GENDER__VALID = 'RULE_GENDER__VALID';
	public const RULE_NEUPID__UNIQUE = 'RULE_NEUPID__UNIQUE';
	public const RULE_NEUPID__NOT_RESERVED = 'RULE_NEUPID__NOT_RESERVED';
	public const RULE_PASSWORD__MIN = 'RULE_PASSWORD__MIN';
	public const RULE_PASSWORD__MAX = 'RULE_PASSWORD__MAX';
	public const RULE_PASSWORD__MATCH = 'RULE_PASSWORD__MATCH';
	public const RULE_AGREEMENT__ACCEPTED = 'RULE_PASSWORD__MATCH';


	// Get the fields.
	final protected function getFields(): array
	{
		return $this->fields;
	}


	// Load the data.
	final public function loadData(array $rawData): void
	{
		foreach ($rawData as $key => $value) {
            $this->setData($key, $value);
		}
	}


	// Get the rules.
	final protected function getRules(): array
	{
		return $this->rules;
	}


    // Set the data.
    final protected function setData($fieldName, $fieldValue): void
    {
        if (in_array($fieldName, $this->getFields())){
            $this->data[$fieldName] = $fieldValue;
        }
    }


	// Get the data.
	final protected function getData($fieldName): mixed
	{
		if (array_key_exists($fieldName, $this->data)) {
			return $this->data[$fieldName];
		} else {
			return null;
		}
	}


	// Function to sanitize the data of the type String, & Array. Checks for the array by looking if the array's key and value are of String type.
	final public function validate(): void
    {
		foreach ($this->getRules() as $fieldName => $fieldCriterias) {
			// Value for that field.
			$fieldValue = $this->getData($fieldName);
            $ruleName = "";
            $ruleData = null;

			// Loop through the criteria for the current field.
			foreach ($fieldCriterias as $criteria) {
				// Extract the rule name and criteria data.
				if (is_array($criteria)) {
					$ruleName = $criteria[0];
					$ruleData = $criteria[1];
				} elseif (is_string($criteria)) {
					$ruleName = $criteria;
				}

                if ($ruleName !== '') {
                    switch ($ruleName) {
                        case 'RULE_ACCOUNTID__NOT_NULL':
                        case 'RULE_ID__NOT_NULL':
                        case 'RULE__REQUIRED':
                            if (empty($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_ID__NULL':
                        case 'RULE_ACCOUNTID__NULL':
                            if (!empty($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_ID__INTEGER':
                        case 'RULE_ACCOUNTID__INTEGER':
                            if (!is_int($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_ACCOUNTTYPE__VALID':
                            if (in_array($fieldValue, ['indiv', 'brand', 'dependent'])) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_NAME__VALID':
                            if (!UtilName::isValidName($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_DISPLAYIMAGE__VALID':
                            if (!UtilUrl::isValidURL($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_DATE__VALID':
                            if (!UtilDatetime::isValidDate($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_BIRTHDATE__VALID':
                            if (!UtilDatetime::isValidBirthdate($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_AGE__VALID':
                            if (!UtilDatetime::isValidAge($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_AGE__INDIV':
                            if (!UtilDatetime::isValidIndivAge($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_AGE__DEPENDENT':
                            if (!UtilDatetime::isValidDependentAge($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_GENDER__VALID':
                            if (!UtilGender::isValidGender($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_NEUPID__VALID':
                            if (!UtilNeupId::isValidNeupIdFormat($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_NEUPID__NOT_RESERVED':
                            if (!UtilNeupId::isReservedNeupId($fieldValue)) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_PASSWORD__MIN_PASSWORD_STRENGTH':
                            if (UtilPassword::calculatePasswordStrength($this->data['password'], $this->data['firstName'], $this->data['middleName'], $this->data['lastName'], $this->data['phone'], $this->data['countryName'], $this->data['birthDate'])) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                        case 'RULE_PASSWORD__MATCH':
                            if ($this->data['password'] !== $this->data['retypedPassword']) {
                                $this->setErrors($fieldName, $ruleName);
                            }
                            break;
                    }
                }
			}
		}
	}


	// Set the error.
	final protected function setErrors(string $fieldName, string $ruleName): void
    {
        $this->errors[$fieldName][] = $ruleName;
	}


    // Check for errors.
    final public function hasErrors($fieldName): bool
    {
        return $this->errors[$fieldName] ?? false;
    }


	// Get the error.
	final public function getErrors($fieldName = null): array
	{
        if ($fieldName !== null){
            return $this->errors[$fieldName];
        }
        return $this->errors;
	}


    // Get the first error.
    final public function getFirstError($fieldName): string
    {
        return $this->getErrors($fieldName)[0];
    }









	// ==============================================================================>
	// ======================= Goes inside the database class =======================>
	// ==============================================================================>



	// // Function to verify the format of data.
	// public function selectData($selectData = NULL)
	// {
	// 	if ($selectData == NULL) {
	// 		$selectData = $this->fields;
	// 	}
	// 	if (is_string($selectData)) {
	// 		$selectData = [$selectData];
	// 	}
	// 	if (!is_array($selectData)) {
	// 		return "ERROR";
	// 	}
	// 	foreach ($selectData as $indivSelectData) {
	// 		if (!in_array($indivSelectData, $this->fields)) {
	// 			return "ERROR";
	// 		}
	// 	}
	// 	$query = 'SELECT `' . implode('`, `', $selectData) . '`';
	// 	return $query;
	// }


	// public function insertData($queryData)
	// {
	// 	$tableName = $this->tableName;
	// 	$allowedFields = $this->fields;
	// 	$queryType = 'QUERY_TYPE_INSERT';
	// 	// Validate the queryData sent.
	// 	if (empty($queryData)) {
	// 		$response =  ["status" => false, "origin" => "app/core/model/insertData().{$tableName}", "type" => "EMPTY.QUERY.QUERY_DATA"];
	// 		error_log(json_encode($response));
	// 		$queryDataEncoded = json_encode($queryData);
	// 		error_log("Empty data has been sent. The data sent is {$queryDataEncoded}. \n\n\n\n");
	// 		return $response;
	// 	}
	// 	// Validate the format of the data sent.
	// 	if (!is_array($queryData)) {
	// 		$response =  ["status" => false, "origin" => "app/core/model/insertData().{$tableName}", "type" => "INVALID.QUERY.QUERY_DATA"];
	// 		error_log(json_encode($response));
	// 		error_log("Invalid data has been sent. The data should be of type array. \n\n\n\n");
	// 		return $response;
	// 	}
	// 	// Validation of the values of the data sent.
	// 	$requiredKeys = ['key', 'value'];
	// 	foreach ($queryData as $indivQueryData) {
	// 		// Validate the required array's keys' name of the data sent (looking at key in [key=>value]).
	// 		foreach ($requiredKeys as $requiredKey) {
	// 			if (!isset($indivQueryData[$requiredKey])) {
	// 				$response =  ["status" => false, "origin" => "app/core/model/readData().{$tableName}", "type" => "INVALID.QUERY.QUERY_DATA"];
	// 				error_log(json_encode($response));
	// 				$queryDataEncoded = json_encode($queryData);
	// 				error_log("The queryData's one or more individual queryData's does not has one or more of the required keys. The queryData was {$queryDataEncoded}. \n\n\n\n");
	// 				return $response;
	// 			}
	// 		}
	// 		// Check if there's anything more than the required ones.
	// 		foreach ($indivQueryData as $indivQueryDataKey => $indivQueryDataValue) {
	// 			if (!in_array($indivQueryDataKey, $requiredKeys)) {
	// 				$response =  ["status" => false, "origin" => "app/core/model/insertData().{$tableName}", "type" => "INVALID.QUERY.QUERY_DATA"];
	// 				error_log(json_encode($response));
	// 				$queryDataEncoded = json_encode($queryData);
	// 				error_log("Invalid data has been sent. One or more of the queryData's key is invalid. The queryData was {$queryDataEncoded}. \n\n\n\n");
	// 				return $response;
	// 			}
	// 			// Checking the value of the array's keys' ('key') value.
	// 			if ($indivQueryDataKey == "key") {
	// 				if (!in_array($indivQueryDataValue, $allowedFields)) {
	// 					$response =  ["status" => false, "origin" => "app/core/model/readData().{$tableName}", "type" => "INVALID.QUERY.QUERY_DATA"];
	// 					error_log(json_encode($response));
	// 					$queryDataEncoded = json_encode($queryData);
	// 					error_log("The queryData's one or more individual queryData's has invalid key value. The queryData was {$queryDataEncoded}. \n\n\n\n");
	// 					error_log(json_encode($allowedFields));
	// 					return $response;
	// 				}
	// 			}
	// 		}
	// 		// Get the result of executeQuery.
	// 		$result = $this->executeQuery($tableName, $queryType, $queryData);
	// 		if (!($result['status'])) {
	// 			$response =  ["status" => false, "origin" => $result['origin'], "type" => $result['type']];
	// 			return $response;
	// 		}
	// 		// Get the affected row count and last insert id.
	// 		$affectedRowsCount = $result['main']['affectedRowsCount'];
	// 		$lastInsertId = $result['main']['lastInsertId'];
	// 		// Prepare and return the response.
	// 		$response =  ["status" => true, "origin" => "app/core/model/insertData().{$tableName}", "type" => "SUCCESS.QUERY.READ_DATA", "main" => ["affectedRowsCount" => $affectedRowsCount, "lastInsertId" => $lastInsertId]];
	// 		return $response;
	// 	}
	// }



	// // Develop function named executeQuery in database class.
	// public function executeQuery()
	// {
	// 	return null;
	// }
}
