<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Participantes Controller
 *
 * @property \App\Model\Table\ParticipantesTable $Participantes
 *
 * @method \App\Model\Entity\Participante[] paginate($object = null, array $settings = [])
 */
class ParticipantesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Relations', 'Expedientes']
        ];
        $participantes = $this->paginate($this->Participantes);

        $this->set(compact('participantes'));
        $this->set('_serialize', ['participantes']);
    }

    /**
     * View method
     *
     * @param string|null $id Participante id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $participante = $this->Participantes->get($id, [
            'contain' => ['Relations', 'Expedientes']
        ]);

        $this->set('participante', $participante);
        $this->set('_serialize', ['participante']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $participante = $this->Participantes->newEntity();
        if ($this->request->is('post')) {
            $participante = $this->Participantes->patchEntity($participante, $this->request->getData());
            if ($this->Participantes->save($participante)) {
                $this->Flash->success(__('The participante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participante could not be saved. Please, try again.'));
        }
        $relations = $this->Participantes->Relations->find('list', ['limit' => 200]);
        $expedientes = $this->Participantes->Expedientes->find('list', ['limit' => 200]);
        $this->set(compact('participante', 'relations', 'expedientes'));
        $this->set('_serialize', ['participante']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Participante id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $participante = $this->Participantes->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $participante = $this->Participantes->patchEntity($participante, $this->request->getData());
            if ($this->Participantes->save($participante)) {
                $this->Flash->success(__('The participante has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The participante could not be saved. Please, try again.'));
        }
        $relations = $this->Participantes->Relations->find('list', ['limit' => 200]);
        $expedientes = $this->Participantes->Expedientes->find('list', ['limit' => 200]);
        $this->set(compact('participante', 'relations', 'expedientes'));
        $this->set('_serialize', ['participante']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Participante id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $participante = $this->Participantes->get($id);
        if ($this->Participantes->delete($participante)) {
            $this->Flash->success(__('The participante has been deleted.'));
        } else {
            $this->Flash->error(__('The participante could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
