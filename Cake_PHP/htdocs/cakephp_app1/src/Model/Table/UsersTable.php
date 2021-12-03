<?php
namespace App\Model\Table;

use Cake\ORM\Table;
//validation
use Cake\Validation\Validator;
class UsersTable extends Table
{
    public function validationDefault(Validator $validator): Validator
    {
        $validator->nonEmptyString('first_name', "First Name is required");
        return $validator;
    }
}