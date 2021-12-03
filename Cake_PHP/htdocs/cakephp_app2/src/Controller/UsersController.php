<?php
namespace App\Controller;

use Cake\ORM\Locator\LocatorAwareTrait;


class UsersController extends AppController
{
    public function index(){
        //retrieves model (class) model/table/userTable
            //model has to be created beforhand
      $usersTable = $this->getTableLocator()->get('users');
      //get all users from UsersTable model
      $allUsers = $usersTable->find()->toArray();

      //SEND $allUsers TO index.php usder the name $allUsers,
        //which is set by the first parameter
      $this->set('allUsers',$allUsers);
      //note that $allUsers contain an array of Entity (User) objects
      //pr($allUsers); testing purposes
      //die;
    }
}