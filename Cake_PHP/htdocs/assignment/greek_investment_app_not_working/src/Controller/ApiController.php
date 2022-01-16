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
      $this->Authentication->addUnauthenticatedActions(['index','view','delete','add']);
         //allow unauthenicated users to access pages inside parameter -->login
   }
   //Get list of trade and the like counter	
   public function view($id){//http://localhost:8084/assignment/greek_investment_app_not_working/api/80.json
    $investmentsTable = $this->fetchTable('Investments');
        $likesTable = $this->fetchTable('likes');
        //$allInvestments = $investmentsTable->findById($id);
        $allInvestments = $investmentsTable->findById($id)->contain(['Tickers'])->all();
        //pr($allInvestments);
        $this->set('allInvestments',$allInvestments);
        $this->viewBuilder()->setOption('serialize', ['allInvestments']);
    }
    public function add()//api.json
    {
        $this->request->allowMethod(['post', 'put']);
        $recipe = $this->request->getData();

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
                $message = 'Saved';
            }else{
                $message = 'Error';
            }
        }
        $this->set([
            'message' => $message,
            'recipe' => $newInvetsment,
        ]);
        $this->viewBuilder()->setOption('serialize', ['recipe', 'message']);
    }
   
   public function delete($id){///api/80.json
        $this->request->allowMethod(['delete']);
        $investmentsTable = $this->fetchTable('Investments'); 
        $investmentToDelete = $investmentsTable->get($id);

        $likesTable = $this->fetchTable('Likes'); 
        $likesToDelete = $likesTable->find()->where(['investment_id'== $id])->first();
        $likesExists = $likesTable->exists(['investment_id' => $id]);

        $message = '';
        if($likesExists){//delete likes table before deleting the investments table due to errors
            $likesTable->delete($likesToDelete);
            if($investmentsTable->delete($investmentToDelete)){
                $message = "Investment and likes has been removed!";
            }else{
                $message = "Could not remove likes and investment!";
            }
        }else{//else in no likes exist
            if($investmentsTable->delete($investmentToDelete)){
                $message = 'Deleted';"Investment has been removed!";
            }else{
                $message = "Could not remove investment!";
            }
        }
        $this->set('message', $message);
        $this->viewBuilder()->setOption('serialize', ['message']);
   }
}