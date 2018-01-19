<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Core\Configure; 

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');

	if ($this->request->params['controller'] == 'Estabelecimentos' && $this->request->params['action'] == 'login'){
		$this->loadComponent('Auth', [
                    'loginAction' => [
                        'controller' => 'Estabelecimentos',
                        'action' => 'login'
                 ],
                'authenticate' => [
                        'Form' => [
                                'fields' => ['username' => 'login',
                                             'password' => 'senha'
                                            ],
                                'userModel' => 'Estabelecimentos'
                                ]
                 ],
                 'loginRedirect' => [
                     'controller' => 'Pages',
                     'action' => 'index'
                 ],
                'logoutRedirect' => [
                        'controller' => 'Pages',
                        'action' => 'display',
                        'home'
                ]
         ]);     
	}else{
		$this->loadComponent('Auth', [
        	    'loginAction' => [
        	        'controller' => 'Consumidores',
                	'action' => 'login'
            	 ],
            	'authenticate' => [
                	'Form' => [
                        	'fields' => ['username' => 'login',
                                	     'password' => 'senha'
                                	    ],
                        	'userModel' => 'Consumidores'
                        	]
           	 ],
           	 'authorize' => ['Controller'],
		 'authError' => 'Area Restrita. Efetue login!',
           	 'loginRedirect' => [
           	     'controller' => 'Pratos',
                     'action' => 'index'
           	 ],
            	'logoutRedirect' => [
                	'controller' => 'Pages',
                	'action' => 'display',
                	'home'
            	]
       	 ]);
	}
        if ($this->request->params['controller'] == 'Estabelecimentos'){
	      $this->Auth->allow(['add']);
	}
	if ($this->request->params['controller'] == 'Consumidores'){
              $this->Auth->allow(['add']);
        }
	
	$session = $this->request->session();
        $estab = $session->read('Auth.User.id');
	$this->set('estab',$estab);

    }
    
    public function isAuthorized($consumidore)
   {
        	if (isset($consumidore['permissao']) && $consumidore['permissao'] === 1) {
                	if ($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'index'){
                        	return true;
                	}else if ($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'view'){
                        	return true;
                	}else if($this->request->params['controller'] == 'Consumidores' && $this->request->params['action'] == 'edit'){
				return true;
			}else if($this->request->params['controller'] == 'Consumidores' && $this->request->params['action'] == 'view'){
				return true;
			}else if($this->request->params['controller'] == 'Enderecos' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Enderecos' && $this->request->params['action'] == 'edit'){
                                return true;
                        }else if($this->request->params['controller'] == 'Enderecos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Enderecos' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Estabelecimentos' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Estabelecimentos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Mesas' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Mesas' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Ingredientes' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Ingredientes' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Categorias' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Categorias' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pedidos' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pedidos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pedidos' && $this->request->params['action'] == 'edit'){
                                return true;
                        }else if($this->request->params['controller'] == 'Consumidores' && $this->request->params['action'] == 'logout'){
                                return true;
                        }else if($this->request->params['controller'] == 'Filapedidos' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Filapedidos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Inicio' && $this->request->params['action'] == 'index'){
                                return true;
                        }
			
		}else if(isset($consumidore['permissao']) && $consumidore['permissao'] === 0){
			if($this->request->params['controller'] == 'Filapedidos' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Consumidores' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Enderecos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Estabelecimentos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Estabelecimentos' && $this->request->params['action'] == 'edit'){
                                return true;
                        }else if($this->request->params['controller'] == 'Estabelecimentos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Estabelecimentos' && $this->request->params['action'] == 'logout'){
                                return true;
                        }else if($this->request->params['controller'] == 'Mesas' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Mesas' && $this->request->params['action'] == 'edit'){
                                return true;
                        }else if($this->request->params['controller'] == 'Mesas' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Mesas' && $this->request->params['action'] == 'delete'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'delete'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'edit'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Ingredientes' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Ingredientes' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Ingredientes' && $this->request->params['action'] == 'edit'){
                                return true;
                        }else if($this->request->params['controller'] == 'Ingredientes' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Ingredientes' && $this->request->params['action'] == 'delete'){
                                return true;
                        }else if($this->request->params['controller'] == 'Filapedidos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Filapedidos' && $this->request->params['action'] == 'edit'){
                                return true;
                        }else if($this->request->params['controller'] == 'Filapedidos' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Filaentregas' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Filaentregas' && $this->request->params['action'] == 'edit'){
                                return true;
                        }else if($this->request->params['controller'] == 'Filaentregas' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pedidos' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pedidos' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Pratos' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Categorias' && $this->request->params['action'] == 'view'){
                                return true;
                        }else if($this->request->params['controller'] == 'Categorias' && $this->request->params['action'] == 'index'){
                                return true;
                        }else if($this->request->params['controller'] == 'Categorias' && $this->request->params['action'] == 'add'){
                                return true;
                        }else if($this->request->params['controller'] == 'Categorias' && $this->request->params['action'] == 'delete'){
                                return true;
                        }else if($this->request->params['controller'] == 'Categorias' && $this->request->params['action'] == 'edit'){
                                return true;
                        }

		}
		return false;

   }


    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return \Cake\Network\Response|null|void
     */
    public function beforeRender(Event $event)
    {
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
    }
	
	
}
