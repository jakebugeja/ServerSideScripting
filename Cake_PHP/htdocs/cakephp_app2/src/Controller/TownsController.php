<?php
namespace App\Controller;
use Cake\Controller\Controller;


class TownsController extends AppController
{
    public function index(){
        $townsTable = $this->fetchTable('Towns');//same as getTableLocater()

        //create an object and will it with all the towns
        $allTowns = $townsTable->find('all');

        //SEND $allTowns TO index.php under the name $allTowns,
        //which is set by the first parameter
      $this->set('allTowns',$allTowns);
      //note that $allTowns contain an array of Entity (Town) objects
    }
    public function add(){
        $townsTable = $this->fetchTable('Towns');//same as getTableLocater()
        if ($this->request->is("post")){//if form was submitted
            $data['town_name'] = strip_tags($this->request->getData());
                //getData() will get user input from the post

            //inserting a new entity(entity is a new row filled with data)
            //reference:https://book.cakephp.org/4/en/orm/entities.html
            $newTown = $townsTable->newEntity($data);
            //reference: https://book.cakephp.org/4/en/orm/saving-data.html
            if ($townsTable->save($newTown)) {
                $this->Flash->success("Town has been saved!");
                return $this->redirect(['action' => 'index']);
            }else{
                echo "error";
            }
        }
        
    }
    public function edit($id){
        $townsTable = $this->fetchTable('Towns');//same as getTableLocater()
        $townToEdit = $townsTable->get($id);
         //check if form is submitted
        if ($this->request->is(['post', 'put'])) {
            //patchEntity(), instead of create() this method is used to update entity
        $townToEdit = $townsTable->patchEntity($townToEdit, $this->request->getData());
                //patch(edit) town with the data from the form, $this->request->getData()

        if ($townsTable->save($townToEdit)) {//save will save changes
            $this->Flash->success("Town has been updated!");

            return $this->redirect(['action' => 'index']);
        }
        else {
            $this->Flash->error("Could not update Town!");
        }
        }
        
        //send townToEdit to populate input fields for edit.php (view)
        $this->set("townToEdit", $townToEdit);
    }
    public function delete($id){
        //reference: https://book.cakephp.org/4/en/orm/deleting-data.html
        
        $townsTable = $this->fetchTable('Towns');
        $townToDelete = $townsTable->findById($id)->contain(['Users'])->first();
        //OR
        //contain() is similiar to JOIN USERS AND TOWNS, 
           //fetch all users containing a relationship with Users, SO WE DONT DELETE
           //A TOWN WHICH IS ASSIGNED TO A USER/S
        if(count($usersInTown->users)>0) {//if there is >=1 user assigned to town then don't 
                                        //delete the town 
            $this->Flash->error("You can't delete town, town is assigned to a user/s");
        }else{
            if($townsTable->delete($townToDelete)){
                $this->Flash->success("Town has been deleted!");
            }else{
                $this->Flash->error("Could not delete town!");
            }
        }
        //delete.php not needed
        return $this->redirect(['action' => 'index']);
    }
    public function showResidents($id){
        //get towns model
        $townsTable = $this->findById('Towns');//same as getTableLocater()
        //$usersInTown
        $usersInTown = $townsTable->findById($id)->contain(['Users'])->first();

        

        pr($usersInTown);
        die;
     }
}

