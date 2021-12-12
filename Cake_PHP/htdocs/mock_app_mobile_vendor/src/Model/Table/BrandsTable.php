<?php
namespace App\Model\Table;

use Cake\ORM\Table;

class BrandsTable extends Table
{
    public function initialize(array $config):void
    {
        $this->hasMany('Mobiles');
        //
        $this->setDisplayField('brand_name');
    }
}