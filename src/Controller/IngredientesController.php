<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Ingredientes Controller
 *
 * @property \App\Model\Table\IngredientesTable $Ingredientes
 */
class IngredientesController extends AppController
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
        $ingredientes = $this->paginate($this->Ingredientes);

        $this->set(compact('ingredientes'));
        $this->set('_serialize', ['ingredientes']);
    }

    /**
     * View method
     *
     * @param string|null $id Ingrediente id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ingrediente = $this->Ingredientes->get($id, [
            'contain' => ['Categorias']
        ]);

        $this->set('ingrediente', $ingrediente);
        $this->set('_serialize', ['ingrediente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ingrediente = $this->Ingredientes->newEntity();
        if ($this->request->is('post')) {
            $ingrediente = $this->Ingredientes->patchEntity($ingrediente, $this->request->data);
	    $ingrediente['criacao'] = date("Y-m-d H:i:s");
	    $ingrediente['alteracao'] = date("Y-m-d H:i:s");
            if ($this->Ingredientes->save($ingrediente)) {
                $this->Flash->success(__('Ingrediente salvo com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao salvar ingrediente.'));
            }
        }
        $categorias = $this->Ingredientes->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('ingrediente', 'categorias'));
        $this->set('_serialize', ['ingrediente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Ingrediente id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ingrediente = $this->Ingredientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ingrediente = $this->Ingredientes->patchEntity($ingrediente, $this->request->data);
            if ($this->Ingredientes->save($ingrediente)) {
                $this->Flash->success(__('The ingrediente has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The ingrediente could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Ingredientes->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('ingrediente', 'categorias'));
        $this->set('_serialize', ['ingrediente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Ingrediente id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ingrediente = $this->Ingredientes->get($id);
        if ($this->Ingredientes->delete($ingrediente)) {
            $this->Flash->success(__('The ingrediente has been deleted.'));
        } else {
            $this->Flash->error(__('The ingrediente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
