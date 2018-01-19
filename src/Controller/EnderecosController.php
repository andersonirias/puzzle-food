<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Enderecos Controller
 *
 * @property \App\Model\Table\EnderecosTable $Enderecos
 */
class EnderecosController extends AppController
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
	
        $this->paginate = [
            'contain' => ['Consumidores'],
	    'conditions' => ['consumidores_id' => $id ]
        ];
        $enderecos = $this->paginate($this->Enderecos);
        $this->set('id',$id);	

        $this->set(compact('enderecos'));
        $this->set('_serialize', ['enderecos']);
    }

    /**
     * View method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
	$session = $this->request->session();
        $user = $session->read('Auth.User.id');

        $endereco = $this->Enderecos->get($id, [
            'contain' => ['Consumidores']
        ]);
	
	$this->set('user',$user);
        $this->set('endereco', $endereco);
        $this->set('_serialize', ['endereco']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $endereco = $this->Enderecos->newEntity();
        if ($this->request->is('post')) {
	    $session = $this->request->session();
            $id = $session->read('Auth.User.id');
            $endereco = $this->Enderecos->patchEntity($endereco, $this->request->data);
	    $endereco['consumidores_id'] = $id;
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('Endereço cadastrado com sucesso.'));

                return $this->redirect(['controller' => 'Enderecos','action' => 'index']);
            } else {
                $this->Flash->error(__('Erro ao cadastrar endereço.'));
            }
        }
        $consumidores = $this->Enderecos->Consumidores->find('list', ['limit' => 200]);
        $this->set(compact('endereco', 'consumidores'));
        $this->set('_serialize', ['endereco']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
	$session = $this->request->session();
        $user = $session->read('Auth.User.id');
        $this->set('user',$user);

        $endereco = $this->Enderecos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
	    $session = $this->request->session();
            $id = $session->read('Auth.User.id');
            $endereco = $this->Enderecos->patchEntity($endereco, $this->request->data);
	    $endereco['consumidores_id'] = $id;
            if ($this->Enderecos->save($endereco)) {
                $this->Flash->success(__('Endereço alterado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The endereco could not be saved. Please, try again.'));
            }
        }
        $consumidores = $this->Enderecos->Consumidores->find('list', ['limit' => 200]);
        $this->set(compact('endereco', 'consumidores'));
        $this->set('_serialize', ['endereco']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Endereco id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $endereco = $this->Enderecos->get($id);
        if ($this->Enderecos->delete($endereco)) {
            $this->Flash->success(__('The endereco has been deleted.'));
        } else {
            $this->Flash->error(__('The endereco could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
