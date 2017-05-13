<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Puestos Controller
 *
 * @property \App\Model\Table\PuestosTable $Puestos
 *
 * @method \App\Model\Entity\Puesto[] paginate($object = null, array $settings = [])
 */
class PuestosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $puestos = $this->paginate($this->Puestos);

        $this->set(compact('puestos'));
        $this->set('_serialize', ['puestos']);
    }

    /**
     * View method
     *
     * @param string|null $id Puesto id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $puesto = $this->Puestos->get($id, [
            'contain' => ['Candidaturas']
        ]);

        $this->set('puesto', $puesto);
        $this->set('_serialize', ['puesto']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $puesto = $this->Puestos->newEntity();
        if ($this->request->is('post')) {
            $puesto = $this->Puestos->patchEntity($puesto, $this->request->getData());
            if ($this->Puestos->save($puesto)) {
                $this->Flash->success(__('The puesto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The puesto could not be saved. Please, try again.'));
        }
        $this->set(compact('puesto'));
        $this->set('_serialize', ['puesto']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Puesto id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $puesto = $this->Puestos->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $puesto = $this->Puestos->patchEntity($puesto, $this->request->getData());
            if ($this->Puestos->save($puesto)) {
                $this->Flash->success(__('The puesto has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The puesto could not be saved. Please, try again.'));
        }
        $this->set(compact('puesto'));
        $this->set('_serialize', ['puesto']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Puesto id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $puesto = $this->Puestos->get($id);
        if ($this->Puestos->delete($puesto)) {
            $this->Flash->success(__('The puesto has been deleted.'));
        } else {
            $this->Flash->error(__('The puesto could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
