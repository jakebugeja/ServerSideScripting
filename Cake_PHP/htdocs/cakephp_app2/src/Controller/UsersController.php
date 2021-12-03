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
    public function add() {
        //we need to check if the form was submitted. We need to check if the request is POST
        if ($this->request->is("post")) {
           
           //this is the model defined in /src/Model/Table/UsersTable.php
           $usersTable = $this->fetchTable('Users');
  
           //data from the form ($_POST)
           //$data = $this->request->getData();
           //pr($data);
  
           $newUser = $usersTable->newEntity($this->request->getData());
  
           if ($usersTable->save($newUser)) {
              $this->Flash->success("User has been saved!");
  
              return $this->redirect(['action' => 'index']);
           }
           else {
              $this->Flash->error("Something wrong happened during user insertion");
           }
        }
     }
}