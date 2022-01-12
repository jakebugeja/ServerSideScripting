<?php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class InvestmentsTable extends Table{
    //relationships: https://book.cakephp.org/4/en/orm/associations.html
    public function initialize(array $config):void
    {
        $this->belongsTo('Tickers');
        $this->belongsTo('Users');
        $this->addBehavior('Timestamp');
    }
    public function validationDefault(Validator $validator): Validator
    {
         $validator
            ->notEmptyString('share',"share name is required")
            ->add('length', 'custom', [
                'rule' => function ($value, $context) {
                    if (!$value) {
                        return false;
                    }
            
                    if ($value < 1) {
                        return 'Error: min share  is 1';
                    }
                    return true;
                }])
            ->notEmptyString('bought_at',"bought at is required");
         return $validator;
    }
}