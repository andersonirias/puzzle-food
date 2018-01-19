<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Bebidas Controller
 *
 * @property \App\Model\Table\BebidasTable $Bebidas
 */
class BebidasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Categorias']
        ];
        $bebidas = $this->paginate($this->Bebidas);

        $this->set(compact('bebidas'));
        $this->set('_serialize', ['bebidas']);
    }

    /**
     * View method
     *
     * @param string|null $id Bebida id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $bebida = $this->Bebidas->get($id, [
            'contain' => ['Categorias']
        ]);

        $this->set('bebida', $bebida);
        $this->set('_serialize', ['bebida']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $bebida = $this->Bebidas->newEntity();
        if ($this->request->is('post')) {
            $bebida = $this->Bebidas->patchEntity($bebida, $this->request->data);
            if ($this->Bebidas->save($bebida)) {
                $this->Flash->success(__('The bebida has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bebida could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Bebidas->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('bebida', 'categorias'));
        $this->set('_serialize', ['bebida']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Bebida id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $bebida = $this->Bebidas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $bebida = $this->Bebidas->patchEntity($bebida, $this->request->data);
            if ($this->Bebidas->save($bebida)) {
                $this->Flash->success(__('The bebida has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The bebida could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Bebidas->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('bebida', 'categorias'));
        $this->set('_serialize', ['bebida']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Bebida id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bebida = $this->Bebidas->get($id);
        if ($this->Bebidas->delete($bebida)) {
            $this->Flash->success(__('The bebida has been deleted.'));
        } else {
            $this->Flash->error(__('The bebida could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
