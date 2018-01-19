<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Consumidores Controller
 *
 * @property \App\Model\Table\ConsumidoresTable $Consumidores
 */
class InicioController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
	$session = $this->request->session();
        $id = $session->read('Auth.User.id');
	$this->set('id',$id);

	$this->loadModel('Filapedidos');
	$this->paginate = [
            'contain' => ['Pedidos'],
	    'conditions' => ['consumidores_id' => $id ] 
        ];
        $filapedidos = $this->paginate($this->Filapedidos);

	
        $this->set(compact('filapedidos'));
        $this->set('_serialize', ['filapedidos']);

   }

}
