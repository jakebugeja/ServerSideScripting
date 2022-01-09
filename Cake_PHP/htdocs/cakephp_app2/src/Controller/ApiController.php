<?php
namespace App\Controller;

class ApiController extends AppController{

    //authentication
   //reference: https://book.cakephp.org/4/en/tutorials-and-examples/cms/authentication.html#adding-password-hashing
   public function beforeFilter(\Cake\Event\EventInterface $event)
   {
      parent::beforeFilter($event);
      // Configure the login action to not require authentication, preventing
      // the infinite redirect loop issue
      $this->Authentication->addUnauthenticatedActions(['login','index','add']);
         //allow unauthenicated users to access pages inside parameter -->login
   }

   //GET
   //api.JSON
   //TURNS DATA INTO JSON
   //http://localhost:8084/cakephp_app2/api.json
   public function index(){
        $townsTable = $this->fetchTable('Towns');//same as getTableLocater()

        //create an object and will it with all the towns
        $allTowns = $townsTable->find()->all();
        $this->set('towns',$allTowns);
        $this->viewBuilder()->setOption('serialize',['towns']);
            //When the view is rendered/viewed, 
            //the town view variable will be serialized into JSON.
            //Therefore [TOWNS -----> JSON]

   }
   //http://localhost:8084/cakephp_app2/api/6.json
   //6 is an id
   public function view($id){//format reference: https://book.cakephp.org/4/en/development/routing.html#resource-routes
       $townsTable = $this->fetchTable('Towns');

       $town = $townsTable->findById($id)->first();
       $this->set('town',$town);

       $this->viewBuilder()->setOption('serialize', ['town']);
            //When the view is rendered/viewed, 
            //the town view variable will be serialized into JSON.
            //Therefore [TOWN (id) -----> JSON]
   }
}