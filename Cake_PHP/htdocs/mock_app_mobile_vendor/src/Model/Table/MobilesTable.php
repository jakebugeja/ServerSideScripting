<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class MobilesTable extends Table
{
    public function initialize(array $config):void
    {
        $this->belongsTo('Brands');
    }
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->requirePresence('model', 'create')
            ->notEmptyString('model');
            return $validator;
    }
}