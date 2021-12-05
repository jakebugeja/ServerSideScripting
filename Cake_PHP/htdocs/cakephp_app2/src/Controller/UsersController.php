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
        //reference: https://book.cakephp.org/4/en/orm/saving-data.html

        //we need to check if the form was submitted. We need to check if the request is POST
        if ($this->request->is("post")) {
           
           //this is the model defined in /src/Model/Table/UsersTable.php
           $usersTable = $this->fetchTable('Users');
            
           //Converting Request Data into Entities
            //getData(), ,get post data from the form
           //$newUser = $usersTable->newEntity($this->request->getData());

           $newUser = $usersTable->newEntity(array());
            $newUser->first_name = strip_tags($this->request->getData('first_name'));
            $newUser->last_name = strip_tags($this->request->getData('last_name'));         
  
           if ($usersTable->save($newUser)) {//save() will sace the changes
              $this->Flash->success("User has been saved!");
  
              return $this->redirect(['action' => 'index']);
           }
           else {
               $errors_messages="";
               $errors = $newUser->getErrors();//get list of errors from UsersTable table validator
               foreach ($errors as $value){//go through each error in the list
                  $errors_messages .= array_values($value)[0]."<br>;";//.= , this appends to string, 
                                                                     //errors_messages
               }
               echo "{$errors_messages}";//OR
               //However flash erros is not working :(
               //$this->Flash->error("Something wrong happened during user insertion<br>$error_messages",
                  //['escape'=>false]);//'escape'=>false] , to enable functionality for <br> tags
            }
        }
     }
     public function edit($id){
        //get user from model
      $usersTable = $this->fetchTable('Users');
      //get the first row by id ($id)
      $userToEdit = $usersTable->findById($id)->first();//OR
         //$userToEdit = $usersTable->get($id);

      //check if form is submitted
      if ($this->request->is(['post', 'put'])) {
         //patchEntity(), instead of create() this method is used to update entity
        $userToEdit = $usersTable->patchEntity($userToEdit, $this->request->getData());
               //patch(edit) user with the data from the form, $this->request->getData()

        if ($usersTable->save($userToEdit)) {//save will save changes
            $this->Flash->success("User has been updated!");

            return $this->redirect(['action' => 'index']);
        }
        else {
            $this->Flash->error("Could not update user!");
        }
      }
      
      //send userToEdit to edit.php (view)
      $this->set("userToEdit", $userToEdit);
   }
   public function delete($id){
      //reference: https://book.cakephp.org/4/en/orm/deleting-data.html
      
      $usersTable = $this->getTableLocator()->get('users');
      $userToDelete = $usersTable->get($id);

      if($usersTable->delete($userToDelete)){
         $this->Flash->success("User has been deleted!");
      }else{
         $this->Flash->error("Could not delete user!");
      }
      //delete.php not needed
      return $this->redirect(['action' => 'index']);
   }

}