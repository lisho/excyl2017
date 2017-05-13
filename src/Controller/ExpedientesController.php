<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Expedientes Controller
 *
 * @property \App\Model\Table\ExpedientesTable $Expedientes
 *
 * @method \App\Model\Entity\Expediente[] paginate($object = null, array $settings = [])
 */
class ExpedientesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $expedientes = $this->paginate($this->Expedientes);

        $this->set(compact('expedientes'));
        $this->set('_serialize', ['expedientes']);
    }

    /**
     * View method
     *
     * @param string|null $id Expediente id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $expediente = $this->Expedientes->get($id, [
            'contain' => ['Convocados', 'Participantes']
        ]);

        $this->set('expediente', $expediente);
        $this->set('_serialize', ['expediente']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $expediente = $this->Expedientes->newEntity();
        if ($this->request->is('post')) {
            $expediente = $this->Expedientes->patchEntity($expediente, $this->request->getData());
            if ($this->Expedientes->save($expediente)) {
                $this->Flash->success(__('The expediente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expediente could not be saved. Please, try again.'));
        }
        $this->set(compact('expediente'));
        $this->set('_serialize', ['expediente']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Expediente id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $expediente = $this->Expedientes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $expediente = $this->Expedientes->patchEntity($expediente, $this->request->getData());
            if ($this->Expedientes->save($expediente)) {
                $this->Flash->success(__('The expediente has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The expediente could not be saved. Please, try again.'));
        }
        $this->set(compact('expediente'));
        $this->set('_serialize', ['expediente']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Expediente id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $expediente = $this->Expedientes->get($id);
        if ($this->Expedientes->delete($expediente)) {
            $this->Flash->success(__('The expediente has been deleted.'));
        } else {
            $this->Flash->error(__('The expediente could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
