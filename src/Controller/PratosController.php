<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pratos Controller
 *
 * @property \App\Model\Table\PratosTable $Pratos
 */
class PratosController extends AppController
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
        $pratos = $this->paginate($this->Pratos);

        $this->set(compact('pratos'));
        $this->set('_serialize', ['pratos']);
    }

    /**
     * View method
     *
     * @param string|null $id Prato id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $prato = $this->Pratos->get($id, [
            'contain' => ['Categorias']
        ]);

        $this->set('prato', $prato);
        $this->set('_serialize', ['prato']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $prato = $this->Pratos->newEntity();
        if ($this->request->is('post')) {
            $prato = $this->Pratos->patchEntity($prato, $this->request->data);
	    $prato['imagem'] = $this->request->data(['imagem','name']);
	    $prato['criacao'] = date("Y-m-d H:i:s");
	    $prato['alteracao'] = date("Y-m-d H:i:s");
	    if (move_uploaded_file($this->request->data(['imagem','tmp_name']),WWW_ROOT.'img/'.$prato['imagem'])){
            	if ($this->Pratos->save($prato)) {
                	$this->Flash->success(__('Prato salvo com sucesso.'));

                	return $this->redirect(['action' => 'index']);
            	} else {
                	$this->Flash->error(__('Erro ao salvar o prato.'));
           	 }
	     }else{
                $this->Flash->error(__('Erro ao salvar a imagem'));
            }
        }
	
        $categorias = $this->Pratos->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('prato', 'categorias'));
        $this->set('_serialize', ['prato']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Prato id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $prato = $this->Pratos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $prato = $this->Pratos->patchEntity($prato, $this->request->data);
            if ($this->Pratos->save($prato)) {
                $this->Flash->success(__('The prato has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The prato could not be saved. Please, try again.'));
            }
        }
        $categorias = $this->Pratos->Categorias->find('list', ['limit' => 200]);
        $this->set(compact('prato', 'categorias'));
        $this->set('_serialize', ['prato']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Prato id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $prato = $this->Pratos->get($id);
        if ($this->Pratos->delete($prato)) {
            $this->Flash->success(__('The prato has been deleted.'));
        } else {
            $this->Flash->error(__('The prato could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
