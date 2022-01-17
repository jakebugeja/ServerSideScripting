<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class TickersTable extends Table{
    public function initialize(array $config):void
    {
        $this->hasMany('Investments');
        //
        $this->setDisplayField('ticker');
    }
}