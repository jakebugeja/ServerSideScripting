<?php
namespace App\Controller;

use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\Log\Log;
use Cake\Log\Engine\FileLog;
class LikesController extends AppController{
    public function index(){

    }
    public function like($id){
        $investmentsTable = $this->fetchTable('Investments'); 
        $investmentToEdit = $investmentsTable->get($id);

        //add these 2 ids into LikesTable
        $likesTable = $this->getTableLocator()->get('Likes');
            
        $getLikedTradeUser = $this->loggedInUser->get('id');//user who liked the trade     
        $newlikes = $likesTable->newEmptyEntity();
        $newlikes=$likesTable->find()->where(['user_id'==$getLikedTradeUser])->where(['investment_id'==$id])->first();

        $newlikes = $likesTable->newEmptyEntity();
        $newlikes->investment_id = $id;//trade selected for like/dislike
        $newlikes->user_id = $getLikedTradeUser;//user who pressed the like
        $newlikes->liked = 1;
        $newlikes->dislike = 0;
        $investmentToEdit->like_counter =  $investmentToEdit->like_counter+1;
        if ($likesTable->save($newlikes)) {
            echo "Like added!";
        }
        if ($investmentsTable->save($investmentToEdit)) { 
            echo "Updated Investments!";
            Log::setConfig('likes', [
                'className' => FileLog::class,
                'path' => LOGS,
                'levels' => ['info'],
                'scopes' => ['likes'],
                'file' => 'likes.log',
            ]);
            Log::info('Logging: userid={user}, {message}, ip={ipaddress}, tradeid={trade_id}', ['scope' => ['likes'], 'user' => $this->loggedInUser->get('id'),
            'ipaddress' => $this->request->clientIp(),
            'message'=> 'LikesController like() was successful',
            'trade_id'=> $id]);
        }else{
            Log::setConfig('likes', [
                'className' => FileLog::class,
                'path' => LOGS,
                'levels' => ['error'],
                'scopes' => ['likes'],
                'file' => 'likes.log',
            ]);
            Log::error('Logging: userid={user}, {message}, ip={ipaddress}, tradeid={trade_id}', ['scope' => ['likes'], 'user' => $this->loggedInUser->get('id'),
            'ipaddress' => $this->request->clientIp(),
            'message'=> 'LikesController like() was unsuccessful',
            'trade_id'=> $id]);
        }
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Investments',
            'action' => 'index',
        ]);
        return $this->redirect($redirect);
    }
    public function dislike($id){
        $investmentsTable = $this->fetchTable('Investments'); 
        $investmentToEdit = $investmentsTable->get($id);

        //add these 2 ids into LikesTable
        $likesTable = $this->getTableLocator()->get('Likes');
            
        $getLikedTradeUser = $this->loggedInUser->get('id');//user who liked the trade     
        $newlikes = $likesTable->newEmptyEntity();
        $newlikes=$likesTable->find()->where(['user_id'==$getLikedTradeUser])->where(['investment_id'==$id])->first();
        
        $newlikes = $likesTable->newEmptyEntity();
        $newlikes->investment_id = $id;//trade selected for like/dislike
        $newlikes->user_id = $getLikedTradeUser;//user who pressed the like
        $newlikes->liked = 0;
        $newlikes->dislike = 1;
        $investmentToEdit->like_counter =  $investmentToEdit->like_counter-1;
        if ($likesTable->save($newlikes)) {
            echo "Like added!";
        }
        if ($investmentsTable->save($investmentToEdit)) { 
            echo "Updated Investments!";
            Log::setConfig('likes', [
                'className' => FileLog::class,
                'path' => LOGS,
                'levels' => ['info'],
                'scopes' => ['likes'],
                'file' => 'likes.log',
            ]);
            Log::info('Logging: userid={user}, {message}, ip={ipaddress}, tradeid={trade_id}', ['scope' => ['likes'], 'user' => $this->loggedInUser->get('id'),
            'ipaddress' => $this->request->clientIp(),
            'message'=> 'LikesController dislike() was successful',
            'trade_id'=> $id]);
        }else{
            Log::setConfig('likes', [
                'className' => FileLog::class,
                'path' => LOGS,
                'levels' => ['error'],
                'scopes' => ['likes'],
                'file' => 'likes.log',
            ]);
            Log::error('Logging: userid={user}, {message}, ip={ipaddress}, tradeid={trade_id}', ['scope' => ['likes'], 'user' => $this->loggedInUser->get('id'),
            'ipaddress' => $this->request->clientIp(),
            'message'=> 'LikesController dislike() was unsuccessful',
            'trade_id'=> $id]);
        }
        $redirect = $this->request->getQuery('redirect', [
            'controller' => 'Investments',
            'action' => 'index',
        ]);
        return $this->redirect($redirect);
    }
}