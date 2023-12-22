<?php

namespace ngframerphp\model\base;

use ngframerphp\core\Model;

abstract class AdvanceModel extends Model
{
    // Properties to be extended by ModelAdvance Classes.
    protected array $fields;
    protected array $data;
    protected array $rules;
    protected array $errors;
}
