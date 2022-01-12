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
    
    //reference: https://book.cakephp.org/4/en/orm/associations.html#
    public function initialize(array $config):void
    {
        $this->hasMany('Investments');
        $this->setDisplayField('email');
    }
}