<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PedidosHasPratos Controller
 *
 * @property \App\Model\Table\PedidosHasPratosTable $PedidosHasPratos
 */
class PedidosHasPratosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pedidos', 'Pratos']
        ];
        $pedidosHasPratos = $this->paginate($this->PedidosHasPratos);

        $this->set(compact('pedidosHasPratos'));
        $this->set('_serialize', ['pedidosHasPratos']);
    }

    /**
     * View method
     *
     * @param string|null $id Pedidos Has Prato id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pedidosHasPrato = $this->PedidosHasPratos->get($id, [
            'contain' => ['Pedidos', 'Pratos']
        ]);

        $this->set('pedidosHasPrato', $pedidosHasPrato);
        $this->set('_serialize', ['pedidosHasPrato']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pedidosHasPrato = $this->PedidosHasPratos->newEntity();
        if ($this->request->is('post')) {
            $pedidosHasPrato = $this->PedidosHasPratos->patchEntity($pedidosHasPrato, $this->request->data);
            if ($this->PedidosHasPratos->save($pedidosHasPrato)) {
                $this->Flash->success(__('The pedidos has prato has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedidos has prato could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->PedidosHasPratos->Pedidos->find('list', ['limit' => 200]);
        $pratos = $this->PedidosHasPratos->Pratos->find('list', ['limit' => 200]);
        $this->set(compact('pedidosHasPrato', 'pedidos', 'pratos'));
        $this->set('_serialize', ['pedidosHasPrato']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pedidos Has Prato id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pedidosHasPrato = $this->PedidosHasPratos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pedidosHasPrato = $this->PedidosHasPratos->patchEntity($pedidosHasPrato, $this->request->data);
            if ($this->PedidosHasPratos->save($pedidosHasPrato)) {
                $this->Flash->success(__('The pedidos has prato has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pedidos has prato could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->PedidosHasPratos->Pedidos->find('list', ['limit' => 200]);
        $pratos = $this->PedidosHasPratos->Pratos->find('list', ['limit' => 200]);
        $this->set(compact('pedidosHasPrato', 'pedidos', 'pratos'));
        $this->set('_serialize', ['pedidosHasPrato']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pedidos Has Prato id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pedidosHasPrato = $this->PedidosHasPratos->get($id);
        if ($this->PedidosHasPratos->delete($pedidosHasPrato)) {
            $this->Flash->success(__('The pedidos has prato has been deleted.'));
        } else {
            $this->Flash->error(__('The pedidos has prato could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
