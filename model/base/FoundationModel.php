<?php

namespace ngframerphp\model\base;

use ngframerphp\core\Model;

abstract class FoundationModel extends Model
{
	// Properties to be extended by ModelFoundation Classes.
    protected string $tableName;
    protected array $fields;
    protected array $data;
    protected array $insertableFields;
    protected array $editableFields;
    protected array $rules;
    protected array $errors;

	
	// Get the table name.
	final protected function getTableName(): string
	{
		return $this->tableName;
	}


	// Get the insertable fields.
	final protected function getInsertableFields(): array
	{
		return $this->insertableFields;
	}


	// Get the editable fields.
	final protected function getEditableFields(): array
	{
		return $this->editableFields;
	}


    final protected function save(){

    }

}
