<?php
namespace App\Model\Table;
use Cake\ORM\Table;

class TownsTable extends Table{
    //one to many relationship with TownsTable.php
    //reference: https://book.cakephp.org/4/en/orm/associations.html#
    public function initialize(array $config):void
    {
        $this->hasMany('Users');

        //reference: https://book.cakephp.org/4/en/orm/retrieving-data-and-resultsets.html
        //Finding Key/Value Pairs
        $this->setDisplayField('town_name');//inorder to view the towns_name from Users/add view,
                                        //from the select option
    }


}