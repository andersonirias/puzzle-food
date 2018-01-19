<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pedidos Controller
 *
 * @property \App\Model\Table\PedidosTable $Pedidos
 */
class PedidosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Consumidores']
        ];
        $pedidos = $this->paginate($this->Pedidos);
	
        $this->set('_serialize', ['pedidos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => ['Consumidores']
        ]);

        $this->set('pedido', $pedido);
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {	
	$this->loadModel('Ingredientes');
	$this->loadModel('Pratos');
	$this->loadModel('Categorias');
	$this->loadModel('Filapedidos');

	$listaIngredientes = $this->paginate($this->Ingredientes);
	$listaPratos = $this->paginate($this->Pratos);
	$listaCategorias = $this->paginate($this->Categorias);

        $pedido = $this->Pedidos->newEntity();

        if ($this->request->is('post')) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
	    $session = $this->request->session();
	    $pedido['consumidores_id'] = $session->read('Auth.User.id');
	    $pedido['criacao'] = date("Y-m-d H:i:s");
	    $pedido['alteracao'] = date("Y-m-d H:i:s");
		$pedido['entrega'] = 0;
		$subs = array('<td>','</td>');
		$pedido['ingredientes'] = str_replace($subs," ",$pedido['ingredientes']);
		$pedido['pratos'] = str_replace($subs," ",$pedido['pratos']);
	    $this->loadModel('Filapedidos');	
			
            $pedidoFeito = $this->Pedidos->save($pedido);

            if ($pedidoFeito) {
		return $this->redirect(['controller' => 'Filapedidos','action' => 'add',$pedidoFeito['id']]);
            } else {
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }


        }
        $consumidores = $this->Pedidos->Consumidores->find('list', ['limit' => 200]);
	$this->set(compact('listaIngredientes',$listaIngredientes));
	$this->set(compact('listaPratos',$listaPratos));
	$this->set(compact('listaCategorias',$listaCategorias));
        $this->set(compact('pedido', 'consumidores'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedido = $this->Pedidos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedido = $this->Pedidos->patchEntity($pedido, $this->request->data);
            if ($this->Pedidos->save($pedido)) {
                $this->Flash->success(__('The pedido has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedido could not be saved. Please, try again.'));
            }
        }
        $consumidores = $this->Pedidos->Consumidores->find('list', ['limit' => 200]);
        $this->set(compact('pedido', 'consumidores'));
        $this->set('_serialize', ['pedido']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedido id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedido = $this->Pedidos->get($id);
        if ($this->Pedidos->delete($pedido)) {
            $this->Flash->success(__('The pedido has been deleted.'));
        } else {
            $this->Flash->error(__('The pedido could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
