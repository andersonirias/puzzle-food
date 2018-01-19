<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Mesas Controller
 *
 * @property \App\Model\Table\MesasTable $Mesas
 */
class MesasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Estabelecimentos']
        ];
        $mesas = $this->paginate($this->Mesas);

        $this->set(compact('mesas'));
        $this->set('_serialize', ['mesas']);
    }

    /**
     * View method
     *
     * @param string|null $id Mesa id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $mesa = $this->Mesas->get($id, [
            'contain' => ['Estabelecimentos']
        ]);

        $this->set('mesa', $mesa);
        $this->set('_serialize', ['mesa']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $mesa = $this->Mesas->newEntity();
        if ($this->request->is('post')) {
            $mesa = $this->Mesas->patchEntity($mesa, $this->request->data);
            if ($this->Mesas->save($mesa)) {
                $this->Flash->success(__('The mesa has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mesa could not be saved. Please, try again.'));
            }
        }
        $estabelecimentos = $this->Mesas->Estabelecimentos->find('list', ['limit' => 200]);
        $this->set(compact('mesa', 'estabelecimentos'));
        $this->set('_serialize', ['mesa']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Mesa id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $mesa = $this->Mesas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $mesa = $this->Mesas->patchEntity($mesa, $this->request->data);
            if ($this->Mesas->save($mesa)) {
                $this->Flash->success(__('The mesa has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The mesa could not be saved. Please, try again.'));
            }
        }
        $estabelecimentos = $this->Mesas->Estabelecimentos->find('list', ['limit' => 200]);
        $this->set(compact('mesa', 'estabelecimentos'));
        $this->set('_serialize', ['mesa']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Mesa id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $mesa = $this->Mesas->get($id);
        if ($this->Mesas->delete($mesa)) {
            $this->Flash->success(__('The mesa has been deleted.'));
        } else {
            $this->Flash->error(__('The mesa could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
