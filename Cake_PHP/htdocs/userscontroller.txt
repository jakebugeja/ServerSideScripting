<?php
namespace App\Controller;

class UsersController extends AppController
{
   public function index() {
       
      //we are accessing the UsersTable model (src/Model/Table/UsersTable.php)
      //then we are calling the find() method and the all() method to retrieve all records
      $allUsers = $this->fetchTable('Users')->find()->all();

      //note that $allUsers contain an array of Entity (User) objects
      //pr($allUsers);
      //die;

      //pr() is a method that actually calls print_r() and adds the <pre> tags :D

      //send the data to the view (templates/Users/index.php)
      $this->set("allUsers", $allUsers);
   }

   public function add() {
      //The form is being submitted to the same page (/users/add) so we need to handle the POST request from this page.


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

   //users/edit/4
   public function edit($id) {
      //echo $id;
      //die;

      //get user from DB
      $usersTable = $this->fetchTable('Users');
      //get the first row by id ($id)
      $userToEdit = $usersTable->findById($id)->first();

      //check if form is submitted
      if ($this->request->is(['post', 'put'])) {
        $userToEdit = $usersTable->patchEntity($userToEdit, $this->request->getData());

        if ($usersTable->save($userToEdit)) {
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
      $userToDelete = $this->Users->get($id);
      //or findById

      if($this->Users->delete($userToDelete))
         $this->Flash->success("User has been deleted");
      else  
         $this->Flash->error("Cannot delete user");
      return $this->redirect(['action'=> "index"]);
   }
}
