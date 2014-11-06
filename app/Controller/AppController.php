<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	public $components = array('Session', 'Cookie', 'Auth');

    public $helpers = array('Html', 'Form', 'Session');

     public function beforeFilter()
   {
        $this->Auth->authenticate = array(
            AuthComponent::ALL => array(
                'userModel' => 'User',
                'fields' => array(
                    'username' => 'email',
                    'password'=>'senha',
                    ),
                'scope' => array(
                    'User.status' => 1,
                    ),
                ),
            'Form',
            );        
        $this->Auth->authorize = 'controller';
       
        $this->Auth->loginAction = array(
            'plugin' => null,
            'controller' => 'users',
            'action' => 'login',
        );
       
        $this->Auth->logoutRedirect = array(
            'plugin' => null,
            'controller' => 'home',
            'action' => 'index',
        );
     
        $this->Auth->loginRedirect = array(
            'plugin' => null,
            'controller' => 'imovels',
            'action' => 'index',
        );

        $this->Auth->authError = __('Você não possui autorização para executar esta ação.');
        
        $this->Auth->allowedActions = array('display');        
   }
   
   public function isAuthorized($user)
   {
     //somente o admin tem acesso a /admin/controller/action
     if (!empty($this->request->params['admin'])) {
 		return $user['role_id'] == 1;
 	}
 	return !empty($user); 	
   }
}
