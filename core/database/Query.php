<?php

namespace ngframerphp\core\database;

use PDO;

class Query
{
    /**
     * @var array|string[]
     */
    private array $fields;
	private string $tableName;
	private array $conditions = [];
	private string $order;
	private int $limit;
    private int $offset;


	public function select(array $fields = ['*']): void
    {
		$this->fields = $fields;
	}

	public function from(string $tableName): void
	{
		$this->tableName = $tableName;
	}

    public function where(array ...$conditions): string
    {
        $where = [];
        foreach ($conditions as $condition) {

            // Validation of name.
            if (!isset($condition['field']) AND !isset($condition[0]) ) {
                return "error";
            }
            $field = $condition['field'] ?? $condition[0];
            // TODO: Add a check for the existence of the field in the table.
            if (!in_array($field, $this->fields)) {
                return "error";
            }

            // Validation of operator.
                if (!isset($condition['field']) AND !isset($condition[0]) ) {
                return "error";
            }


            // TODO: Add a check for the existence of the field in the table, to be implemented.
            $validOperators = ['=', '!=', '<>', '>', '<', '>=', '<=', 'LIKE', 'NOT LIKE'];
                if (!in_array($condition['operator'], $validOperators)) {
                    continue;
                }
            if (isset($condition['function'])) {
                // Handle custom functions if provided
                $functionData = $condition['function'];

                $functionName = $functionData['name'];
                $functionValue = $functionData['value'];

                // Check if the function name and its format exist
                $validFunctionFormats = [
                    'levenshtein' => "LEVENSHTEIN('$name', '$functionValue') $operator",
                    'reverse' => "REVERSE('$name') $operator"
                    // Add more function formats as needed
                ];

                if (array_key_exists($functionName, $validFunctionFormats)) {
                    $where[] = $validFunctionFormats[$functionName];
                }
            } else {
                // Handle regular comparisons
                $value = $condition['value'] ?? null;
                if ($value !== null) {
                    $where[] = "$name $operator '$value'";
                }
            }
        }

        // Construct the WHERE clause
        $whereClause = implode(' AND ', $where);
        return $whereClause;
    }


    public function order(array ...$orderConditions): void
    {
        $order = [];
        foreach ($orderConditions as $orderCondition) {
            $orderCondition = array_change_key_case($orderCondition);
            $field = strtolower($orderCondition['field'] ?? $orderCondition[0]);
            $orderBy = strtoupper($orderCondition['order'] ?? $orderCondition[1]);
            $order[] = "$field $orderBy";
        }
        $this->order = implode(', ', $order);
    }


	public function limit(int $limit = 25)
	{
		$this->limit = $limit;
		return $this->limit;
	}


    public function offset(int $offset = 0)
    {
        $this->offset = $offset;
        return $this->offset;
    }



    public function build(): array
	{
		$query = "SELECT " . implode(', ', $this->fields) . " FROM $this->table";

		if (!empty($this->conditions)) {
			$query .= " WHERE "  . $this->conditions;
		}

		if (!empty($this->order)) {
			$query .= " ORDER BY " . $this->order;
		}

		if ($this->limit) {
			$query .= " LIMIT ?";
		}

		return [$query, $this->conditions];
	}
}


