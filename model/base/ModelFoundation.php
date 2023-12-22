<?php

namespace ngframer\model\base;

use ngframerphp\core\Model;

class ModelFoundation extends Model
{
	// Properties extened by ModelFoundation classes.
	private string $tableName = "";
	private array $insertableFields = [];
	private array $editableFields = [];

	
	// Get the table name.
	private function getTableName(): string
	{
		return $this->tableName;
	}


	// Get the insertable fields.
	private function getInsertableFields(): array
	{
		return $this->insertableFields;
	}


	// Get the editable fields.
	private function getEditableFields(): array
	{
		return $this->editableFields;
	}
}
