<?php
namespace App\Controller;

use Cake\ORM\Locator\LocatorAwareTrait;

class MobilesController extends AppController
{
    public function index(){
        $mobilesTable = $this->fetchTable('Mobiles');
        $allMobiles = $mobilesTable->find('all')->toArray();
        //pr($mobiles);
        //die;
        $this->set('allMobiles', $allMobiles);
    }

    public function add(){
        $data = $this->request->getData();//get POST data

        //retrieve brands and list items into select for options
        $brandsTable = $this->fetchTable('Brands');
        $query = $brandsTable->find('list');
        $selectBrand = $query->toArray();
        $this->set('selectBrand',$selectBrand);//send to view

        $mobilesTable = $this->fetchTable('Mobiles');
        $newMobile = $mobilesTable->newEntity($data);
        if($mobilesTable->save($newMobile)){//push data
            echo "Mobile added!";
        }else{
            echo "Error: MobilesController -- Mobile not listed";
        }

        
    }
}
