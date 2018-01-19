<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Filaentregas Controller
 *
 * @property \App\Model\Table\FilaentregasTable $Filaentregas
 */
class FilaentregasController extends AppController
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
        $filaentregas = $this->paginate($this->Filaentregas);

        $this->set(compact('filaentregas'));
        $this->set('_serialize', ['filaentregas']);
    }

    /**
     * View method
     *
     * @param string|null $id Filaentrega id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $filaentrega = $this->Filaentregas->get($id, [
            'contain' => ['Pedidos']
        ]);

        $this->set('filaentrega', $filaentrega);
        $this->set('_serialize', ['filaentrega']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $filaentrega = $this->Filaentregas->newEntity();
        if ($this->request->is('post')) {
            $filaentrega = $this->Filaentregas->patchEntity($filaentrega, $this->request->data);
            if ($this->Filaentregas->save($filaentrega)) {
                $this->Flash->success(__('The filaentrega has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filaentrega could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->Filaentregas->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('filaentrega', 'pedidos'));
        $this->set('_serialize', ['filaentrega']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Filaentrega id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $filaentrega = $this->Filaentregas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $filaentrega = $this->Filaentregas->patchEntity($filaentrega, $this->request->data);
            if ($this->Filaentregas->save($filaentrega)) {
                $this->Flash->success(__('The filaentrega has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The filaentrega could not be saved. Please, try again.'));
            }
        }
        $pedidos = $this->Filaentregas->Pedidos->find('list', ['limit' => 200]);
        $this->set(compact('filaentrega', 'pedidos'));
        $this->set('_serialize', ['filaentrega']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Filaentrega id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $filaentrega = $this->Filaentregas->get($id);
        if ($this->Filaentregas->delete($filaentrega)) {
            $this->Flash->success(__('The filaentrega has been deleted.'));
        } else {
            $this->Flash->error(__('The filaentrega could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
