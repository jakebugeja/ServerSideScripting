<?php
namespace App\Controller;
use Cake\Log\Log;
use Cake\Log\Engine\FileLog;
use Cake\ORM\Locator\LocatorAwareTrait;

class InvestmentsController extends AppController{
   public function index(){
        $investmentsTable = $this->fetchTable('Investments');
        $likesTable = $this->fetchTable('likes');
        $allInvestments = $investmentsTable->find()->contain(['Tickers'])->all();
        $allLikes = $likesTable->find('all');

        $user = $this->loggedInUser->get('email');//get user id from controller
        $session = $this->loggedInUser->get('id');
        //$first_name = $this->loggedInUser->get('first_name');
        $last_name = $this->loggedInUser->get('last_name');

        $usersTable = $this->fetchTable('Users');
        $this->set('usersTable', $usersTable);

        $this->set('user_username', $user);
        
        $this->set('user_session', $session);

        $this->set('allInvestments', $allInvestments);
        $this->set('likesTable', $likesTable);
        $this->set('allLikes', $allLikes);
   }

    public function add(){
        $data = $this->request->getData();//get POST data

        //retrieve tickers and list items into select for options
        $tickersTable = $this->fetchTable('Tickers');
        $query = $tickersTable->find('list');
        $selectTicker = $query->toArray();
        //select privacy
        $selectPrivacy = array('True','False');

        
        //send to add
        $this->set('selectTicker',$selectTicker);//send to view
        $this->set('selectPrivacy',$selectPrivacy);//send to view
        if ($this->request->is("post")) {
            $investmentsTable = $this->fetchTable('Investments');
            
            $data['share'] = strip_tags($this->request->getData('share'));
            $data['bought_at'] = strip_tags($this->request->getData('bought_at'));
            
            $newInvetsment = $investmentsTable->newEntity($data);

            //get loggedinuserid
            $user = $this->loggedInUser->get('id');//get user id from controller
            

            $newInvetsment->set('user_id', $user);
            if($investmentsTable->save($newInvetsment)){//push data
                $this->Flash->success("Investment added!");
                Log::setConfig('trades', [
                    'className' => FileLog::class,
                    'path' => LOGS,
                    'levels' => ['info'],
                    'scopes' => ['trades'],
                    'file' => 'trades.log',
                ]);
                Log::info('Logging: userid={user}, {message}, ip={ipaddress}, tradeid={trade_id}', ['scope' => ['trades'], 'user' => $this->loggedInUser->get('id'),
                'ipaddress' => $this->request->clientIp(),
                'message'=> 'InvestmentController add() was successful',
                'trade_id'=> $newInvetsment->id]);
            }else{
                $this->Flash->error("Error: InvestmentsController -- Investment not added");
                Log::setConfig('trades', [
                    'className' => FileLog::class,
                    'path' => LOGS,
                    'levels' => ['error'],
                    'scopes' => ['trades'],
                    'file' => 'trades.log',
                ]);
                Log::error('Logging: userid={user}, {message}, ip={ipaddress}, tradeid={trade_id}', ['scope' => ['trades'], 'user' => $this->loggedInUser->get('id'),
                'ipaddress' => $this->request->clientIp(),
                'message'=> 'InvestmentController add() was unsuccessful',
                'trade_id'=> $newInvetsment->id]);
            }
        }
    }
    public function delete($id){//id is recieved from index
        //reference: https://book.cakephp.org/4/en/orm/deleting-data.html
      
        $investmentsTable = $this->fetchTable('Investments'); 
        $investmentToDelete = $investmentsTable->get($id);

        $likesTable = $this->fetchTable('Likes'); 
        $likesToDelete = $likesTable->find()->where(['investment_id'== $id])->first();
        $likesExists = $likesTable->exists(['investment_id' => $id]);
        if($likesExists){//delete likes table before deleting the investments table due to errors
            $likesTable->delete($likesToDelete);
            if($investmentsTable->delete($investmentToDelete)){
                $this->Flash->success("Investment has been removed!");
            }else{
                $this->Flash->error("Could not remove investment!");
            }
        }else{
            if($investmentsTable->delete($investmentToDelete)){
                $this->Flash->success("Investment has been removed!");
            }else{
                $this->Flash->error("Could not remove investment!");
            }
        }
        
         //delete.php not needed
         return $this->redirect(['action' => 'index']);
    }
    public function edit($id){//id is recieved from index
        //get investments from model
      $investmentTable = $this->fetchTable('Investments');
      //get the first row by id ($id)
      $investmentToEdit = $investmentTable->findById($id)->first();

      //$this->set('allInvestments',$allInvestments);

      //check if form is submitted
      if ($this->request->is(['post', 'put'])) {
        //patchEntity(), instead of create() this method is used to update entity
       $investmentToEdit = $investmentTable->patchEntity($investmentToEdit, $this->request->getData());
              //patch(edit) user with the data from the form, $this->request->getData()

       if ($investmentTable->save($investmentToEdit)) {//save will save changes
           $this->Flash->success("User has been updated!");
           return $this->redirect(['action' => 'index']);
       }
       else {
           $this->Flash->error("Could not update investment!");
       }
     }
     //send investmentToEdit populate input fields for edit.php (view)
     $this->set("investmentToEdit", $investmentToEdit);
    }
    public function share($id){//id = investment id
        $investmentsTable = $this->fetchTable('Investments'); 
        $investmentToShare = $investmentsTable->get($id);
        $this->set('investmentToShare',$investmentToShare);//send to view

        //retrieve tickers and list items into select for options
        $tickersTable = $this->fetchTable('Tickers');
        $query = $tickersTable->find('list');
        $selectTicker = $query->toArray();
        
        $usersTable = $this->fetchTable('Users');
        $query = $usersTable->find('list');
        $selectUser = $query->toArray();

        $this->set('selectTicker',$selectTicker);//send to view
        $this->set('selectUser',$selectUser);//send to view to populate

        if ($this->request->is(['post', 'put'])) {
            //$user = $this->request->getData('user_id');//getting selected user id
            $data = $this->request->getData();//getting the rest of the form 
            
            //$investmentToShare->set('user_id', $user);
            $investmentToShare = $investmentsTable->newEntity($data);
            
            //pr($investmentToShare);
            if($investmentsTable->save($investmentToShare)){//push data
                $this->Flash->success("Investment shared!");
                echo "Investment shared!";
            }else{
                $this->Flash->error("Error: InvestmentsController -- Investment not sahred");
                echo "Error: InvestmentsController -- Investment not added";
            }
            
        }
    }
    public function like($id){
        $investmentsTable = $this->fetchTable('Investments'); 
        $investmentToEdit = $investmentsTable->get($id);

        $investmentToEdit->like_counter =  ($investmentToEdit->like_counter)+1;
        $investmentsTable->save($investmentToEdit);

        //redirect to index inside Investments controller
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Investments',
            'action' => 'index',
        ]);

        return $this->redirect($redirect);
    }
}