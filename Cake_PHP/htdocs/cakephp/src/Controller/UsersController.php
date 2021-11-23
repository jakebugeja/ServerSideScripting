<?php
namespace App\Controller;

class UsersController extends AppController
{
    public function index(){
        echo "Hello from index() method";//controller should never print
        $usersTable = $this->getTableLocator()->get('Users');

        $allUsers = $usersTable->find()->all();

        $this->set('allUsers',$allUsers);

    }
}
