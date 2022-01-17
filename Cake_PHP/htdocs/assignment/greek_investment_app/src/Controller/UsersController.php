<?php
namespace App\Controller;

use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Log\Log;
use Cake\Log\Engine\FileLog;

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
    $this->request->allowMethod(['get', 'post']);
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
         Log::setConfig('users', [
            'className' => FileLog::class,
            'path' => LOGS,
            'levels' => ['info'],
            'scopes' => ['users'],
            'file' => 'users.log',
        ]);
        Log::info('Logging: userid={user}, {message}, ip={ipaddress}', ['scope' => ['users'], 'user' => $this->loggedInUser->get('id'),
        'ipaddress' => $this->request->clientIp(),
        'message'=> 'UsersController login() was successful']);


        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Investments',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
    // display error if user submitted and authentication failed
    if ($this->request->is('post') && !$result->isValid()) {
        $this->Flash->error('Invalid username or password');
        Log::setConfig('users', [
         'className' => FileLog::class,
         'path' => LOGS,
         'levels' => ['error'],
         'scopes' => ['users'],
         'file' => 'users.log',
     ]);
     Log::error('Logging: userid={user}, {message}, ip={ipaddress}', ['scope' => ['users'], 'user' => $this->loggedInUser->get('id'),
     'ipaddress' => $this->request->clientIp(),
     'message'=> 'UsersController login() was unsuccessful']);
    }
}
    public function logout()
   {
    $result = $this->Authentication->getResult();
    // regardless of POST or GET, redirect if user is logged in
    if ($result->isValid()) {
        $this->Authentication->logout();
        
        Log::setConfig('users', [
         'className' => FileLog::class,
         'path' => LOGS,
         'levels' => ['info'],
         'scopes' => ['users'],
         'file' => 'users.log',
     ]);
     Log::info('Logging: userid={user}, {message}, ip={ipaddress}', ['scope' => ['users'], 'user' => $this->loggedInUser->get('id'),
     'ipaddress' => $this->request->clientIp(),
     'message'=> 'UsersController logout() was successful']);

      return $this->redirect(['controller' => 'Users', 'action' => 'login']);
    }else{
      Log::setConfig('users', [
         'className' => FileLog::class,
         'path' => LOGS,
         'levels' => ['error'],
         'scopes' => ['users'],
         'file' => 'users.log',
     ]);
     Log::error('Logging: userid={user}, {message}, ip={ipaddress}', ['scope' => ['users'], 'user' => $this->loggedInUser->get('id'),
     'ipaddress' => $this->request->clientIp(),
     'message'=> 'UsersController logout() was unsuccessful']);
    }
   }
   public function add()
   {
      
      if ($this->request->is("post")) {
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
      
   }
   public function userlist(){
      $usersTable = $this->fetchTable('Users');
      $allUsers = $usersTable->find('all')->toArray();
      $this->set('allUsers', $allUsers);
   }
}