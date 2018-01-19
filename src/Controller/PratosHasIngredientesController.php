<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * PratosHasIngredientes Controller
 *
 * @property \App\Model\Table\PratosHasIngredientesTable $PratosHasIngredientes
 */
class PratosHasIngredientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Pratos', 'Ingredientes']
        ];
        $pratosHasIngredientes = $this->paginate($this->PratosHasIngredientes);

        $this->set(compact('pratosHasIngredientes'));
        $this->set('_serialize', ['pratosHasIngredientes']);
    }

    /**
     * View method
     *
     * @param string|null $id Pratos Has Ingrediente id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pratosHasIngrediente = $this->PratosHasIngredientes->get($id, [
            'contain' => ['Pratos', 'Ingredientes']
        ]);

        $this->set('pratosHasIngrediente', $pratosHasIngrediente);
        $this->set('_serialize', ['pratosHasIngrediente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $pratosHasIngrediente = $this->PratosHasIngredientes->newEntity();
        if ($this->request->is('post')) {
            $pratosHasIngrediente = $this->PratosHasIngredientes->patchEntity($pratosHasIngrediente, $this->request->data);
            if ($this->PratosHasIngredientes->save($pratosHasIngrediente)) {
                $this->Flash->success(__('The pratos has ingrediente has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pratos has ingrediente could not be saved. Please, try again.'));
            }
        }
        $pratos = $this->PratosHasIngredientes->Pratos->find('list', ['limit' => 200]);
        $ingredientes = $this->PratosHasIngredientes->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('pratosHasIngrediente', 'pratos', 'ingredientes'));
        $this->set('_serialize', ['pratosHasIngrediente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pratos Has Ingrediente id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pratosHasIngrediente = $this->PratosHasIngredientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pratosHasIngrediente = $this->PratosHasIngredientes->patchEntity($pratosHasIngrediente, $this->request->data);
            if ($this->PratosHasIngredientes->save($pratosHasIngrediente)) {
                $this->Flash->success(__('The pratos has ingrediente has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The pratos has ingrediente could not be saved. Please, try again.'));
            }
        }
        $pratos = $this->PratosHasIngredientes->Pratos->find('list', ['limit' => 200]);
        $ingredientes = $this->PratosHasIngredientes->Ingredientes->find('list', ['limit' => 200]);
        $this->set(compact('pratosHasIngrediente', 'pratos', 'ingredientes'));
        $this->set('_serialize', ['pratosHasIngrediente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pratos Has Ingrediente id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pratosHasIngrediente = $this->PratosHasIngredientes->get($id);
        if ($this->PratosHasIngredientes->delete($pratosHasIngrediente)) {
            $this->Flash->success(__('The pratos has ingrediente has been deleted.'));
        } else {
            $this->Flash->error(__('The pratos has ingrediente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
