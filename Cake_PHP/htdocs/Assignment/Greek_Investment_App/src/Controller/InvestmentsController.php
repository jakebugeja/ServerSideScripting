<?php
namespace App\Controller;

use Cake\ORM\Locator\LocatorAwareTrait;

class InvestmentsController extends AppController{
    public function index(){
        
        $investmentsTable = $this->fetchTable('Investments');
        $allInvestments = $investmentsTable->find()->contain(['Tickers'])->all();
        //$allInvestments = $investmentsTable->find('all')->toArray();
        //send to index
        //pr ($allInvestments);
        //die;
        $this->set('allInvestments', $allInvestments);
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
            if($investmentsTable->save($newInvetsment)){//push data
                $this->Flash->success("Investment added!");
                //echo "Investment added!";
            }else{
                $this->Flash->error("Error: InvestmentsController -- Investment not added");
                //echo "Error: InvestmentsController -- Investment not added";
            }
        }
    }
    public function delete($id){//id is recieved from index
        //reference: https://book.cakephp.org/4/en/orm/deleting-data.html
      
        $investmentsTable = $this->fetchTable('Investments'); 
        $investmentToDelete = $investmentsTable->get($id);

        if($investmentsTable->delete($investmentToDelete)){
            $this->Flash->success("Investment has been removed!");
         }else{
            $this->Flash->error("Could not remove investment!");
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
}