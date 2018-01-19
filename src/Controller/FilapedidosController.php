<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Filapedidos Controller
 *
 * @property \App\Model\Table\FilapedidosTable $Filapedidos
 */
class FilapedidosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos']
        ];
        $filapedidos = $this->paginate($this->Filapedidos);
	$session = $this->request->session();
        $estab = $session->read('Auth.User.id');
	$this->set('estab',$estab);

        $this->set(compact('filapedidos'));
        $this->set('_serialize', ['filapedidos']);
    }

    /**
     * View method
     *
     * @param string|null $id Filapedido id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filapedido = $this->Filapedidos->get($id, [
            'contain' => ['Pedidos']
        ]);

        $this->set('filapedido', $filapedido);
        $this->set('_serialize', ['filapedido']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add($ped = null)
    {	
	
        $filapedido = $this->Filapedidos->newEntity();

	if ($ped){
		$pedido = array();
		$pedido['chegada'] = date("Y-m-d H:i:s");
                $pedido['status'] = 'Novo';
                $pedido['observacoes'] = '';
                $pedido['posicao'] = 0;
                $pedido['saida'] = date("Y-m-d H:i:s");
                $pedido['pedidos_id'] = $ped;

		$filapedido = $this->Filapedidos->patchEntity($filapedido, $pedido);
		
		$this->loadModel('Enderecos');
		$session = $this->request->session();
        	$id = $session->read('Auth.User.id');

        	$this->paginate = [
        	    'contain' => ['Consumidores'],
        	    'conditions' => ['consumidores_id' => $id ]
        	];
        	$enderecos = $this->paginate($this->Enderecos);
        	$this->set('ped',$ped);

        	$this->set(compact('enderecos'));
        	$this->set('_serialize', ['enderecos']);
	
		if ($this->request->is('post')){
			$pedido = array();
	                $pedido['chegada'] = date("Y-m-d H:i:s");
			$pedido['enderecos_id'] = $this->request->data('enderecoselec');
        	        $pedido['status'] = 'Novo';
                	$pedido['observacoes'] = '';
                	$pedido['posicao'] = 0;
                	$pedido['saida'] = date("Y-m-d H:i:s");
                	$pedido['pedidos_id'] = $this->request->data('pedido');

                	$filapedido = $this->Filapedidos->patchEntity($filapedido, $pedido);
			if ($this->Filapedidos->save($filapedido)) {
				$this->Flash->success(__('Pedido Realizado com sucesso.'));
				return $this->redirect(['controller' => 'Inicio','action' => 'index']);

        		} else {
                		$this->Flash->error(__('Erro ao adicionar na fila.'));
            		}
		}

	}

        if ($this->request->is('post')) {
            $filapedido = $this->Filapedidos->patchEntity($filapedido, $this->request->data);
		debug($this->request->data);
            if ($this->Filapedidos->save($filapedido)) {
                $this->Flash->success(__('The filapedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filapedido could not be saved. Please, try again.'));
            }
        }

        $pedidos = $this->Filapedidos->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('filapedido', 'pedidos'));
        $this->set('_serialize', ['filapedido']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Filapedido id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filapedido = $this->Filapedidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filapedido = $this->Filapedidos->patchEntity($filapedido, $this->request->data);
            if ($this->Filapedidos->save($filapedido)) {
                $this->Flash->success(__('The filapedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filapedido could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->Filapedidos->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('filapedido', 'pedidos'));
        $this->set('_serialize', ['filapedido']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Filapedido id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filapedido = $this->Filapedidos->get($id);
        if ($this->Filapedidos->delete($filapedido)) {
            $this->Flash->success(__('The filapedido has been deleted.'));
        } else {
            $this->Flash->error(__('The filapedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
