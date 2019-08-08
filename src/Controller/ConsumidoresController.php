<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Consumidores Controller
 *
 * @property \App\Model\Table\ConsumidoresTable $Consumidores
 */
class ConsumidoresController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $consumidores = $this->paginate($this->Consumidores);

        $this->set(compact('consumidores'));
        $this->set('_serialize', ['consumidores']);
    }

    /**
     * View method
     *
     * @param string|null $id Consumidore id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {	
	$session = $this->request->session();
        $id = $session->read('Auth.User.id');
        $this->set('id',$id);
	
        $consumidore = $this->Consumidores->get($id, [
            'contain' => []
        ]);

        $this->set('consumidore', $consumidore);
        $this->set('_serialize', ['consumidore']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $consumidore = $this->Consumidores->newEntity();
        if ($this->request->is('post')) {
            $consumidore = $this->Consumidores->patchEntity($consumidore, $this->request->data);
            $consumidore['senha'] = crypt($consumidore['senha'],'$2a$'.'08'.'$'.'Cf1f11ePArKlBJomM0F6aJ'.'$');
            $consumidore['criacao'] = date("Y-m-d H:i:s");
            $consumidore['alteracao'] = date("Y-m-d H:i:s");
            $consumidore['permissao'] = 1;
            if ($this->Consumidores->save($consumidore)) {
                $this->Flash->success(__('Cadastro realizado com sucesso.'));

                return $this->redirect(['controller' => 'Consumidores', 'action' => 'login']);
            } else {
                $this->Flash->error(__('Falha ao realizar cadastro tente novamente.'));
            }
        }
        $this->set(compact('consumidore'));
        $this->set('_serialize', ['consumidore']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Consumidore id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {	
        $session = $this->request->session();
        $id = $session->read('Auth.User.id');
        $this->set('id',$id);

        $consumidore = $this->Consumidores->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $consumidore = $this->Consumidores->patchEntity($consumidore, $this->request->data);
            if ($this->Consumidores->save($consumidore)) {
                $this->Flash->success(__('The consumidore has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The consumidore could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('consumidore'));
        $this->set('_serialize', ['consumidore']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Consumidore id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $consumidore = $this->Consumidores->get($id);
        if ($this->Consumidores->delete($consumidore)) {
            $this->Flash->success(__('The consumidore has been deleted.'));
        } else {
            $this->Flash->error(__('The consumidore could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function login()
    {
    	if ($this->request->is('post')) {
        	$consumidores = $this->Auth->identify();
        	if ($consumidores) {
            		$this->Auth->setUser($consumidores);
            		return $this->redirect(['controller' => 'Inicio', 'action' => 'index']);
        	}
        	$this->Flash->error(__('Usuário ou senha ínvalido, tente novamente'));
    	}
    }
    public function logout()
    {
        $this->redirect($this->Auth->logout());
    }

}
