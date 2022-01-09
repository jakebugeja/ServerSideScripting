<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/4/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('FormProtection');`
     *
     * @return void
     */

    public $loggedInUser;

    public function initialize(): void
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

        //cake php
        //reference: https://book.cakephp.org/4/en/tutorials-and-examples/cms/authentication.html#adding-password-hashing
        // Add this line to check authentication result and lock your site
        $this->loadComponent('Authentication.Authentication');

        //if user is logged in...
        if($user = $this->Authentication->getIdentity()){
            //send the logged in user as $loggedInUser to ALL views (because we are in hte app controller)
            $this->set('loggedInUser',$user);//VISABLE FROM ALL THE VIEWS
            $this->loggedInUser = $user;//VISABLE FROM ALL THE CONTROLLERS (PUBLIC)


        }
    }
}
