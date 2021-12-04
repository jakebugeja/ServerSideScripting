<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;


class UsersTable extends Table
{
    //Creating A Default Validation Set
    //reference: https://book.cakephp.org/4/en/orm/validation.html

    /*
    [Model validates when adding and editing user]
    Request data will be validated.
    Valid data will be set into the entity, while fields that failed validation will be excluded.
    */

    public function validationDefault(Validator $validator): Validator
    {
         $validator
            ->notEmptyString('first_name',"First name is required")
            ->notEmptyString('last_name',"Last name is required");
         return $validator;
    }
}