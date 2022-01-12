<?php
namespace App\Controller;

use Cake\ORM\Locator\LocatorAwareTrait;

class UsersController extends AppController{


public function beforeFilter(\Cake\Event\EventInterface $event)
{
   parent::beforeFilter($event);
   // Configure the login action to not require authentication, preventing
   // the infinite redirect loop issue
   $this->Authentication->addUnauthenticatedActions(['login','add','loginWithGoogle','google']);
      //allow unauthenicated users to access pages inside parameter -->login
}

public function login()
{
   /*
   //GOOGLE LOGIN
   require_once 'vendor/autoload.php';
   //Make object of Google API Client for call Google API
   $client = new Google_Client();
   $client->setClientId('918875234064-ddvpp4c6kn6pupqge1kiki74l5p177v7.apps.googleusercontent.com');
   $client->setClientSecret('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');
   $client->setRedirectUri('http://localhost:8084/assignment/greek_investment_app/users/login?redirect=%2F');
   $google_client->addScope('email');
   $google_client->addScope('profile');
   //start session on web page
   session_start();
   
   $url = $client->createAuthUrl();
   $this->set('clientAuth',$client);
   //END GOOGLE LOGIN
*/
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        // redirect to /Users after login success
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Investments',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error('Invalid username or password');
    }
}
    public function logout()
   {
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        $this->Authentication->logout();
        return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }
   }
   public function add()
   {
      
      if ($this->request->is("post")) {
           
         //this is the model defined in /src/Model/Table/UsersTable.php
         $usersTable = $this->fetchTable('Users');

         $data = $this->request->getData();//get data from form, store it in $data
          //strip_tags (for additional security)
          $data['first_name'] = strip_tags($this->request->getData('first_name'));
          $data['last_name'] = strip_tags($this->request->getData('last_name'));         

          $newUser = $usersTable->newEntity($data);

         if ($usersTable->save($newUser)) {//save() will save the changes
            $this->Flash->success("User has been saved!");

            return $this->redirect(['action' => 'login']);
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
   public function google(){
      /*
      background request
      $_POST to retrieve the data from the google popup; 
      $("googlebttn").click(function(){
      $.post("TOUR ADDRESS URL/google", function(data == 1/0,  status == 400/others... [success/fail]){
         alert("Data: " + data + "\nStatus: " + status);
         });
      });

      return/echo 1;
      */
      
   }
   public function userlist(){
      $usersTable = $this->fetchTable('Users');
      $allUsers = $usersTable->find('all')->toArray();
      $this->set('allUsers', $allUsers);
   }
}