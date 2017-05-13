<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Candidaturas Controller
 *
 * @property \App\Model\Table\CandidaturasTable $Candidaturas
 *
 * @method \App\Model\Entity\Candidatura[] paginate($object = null, array $settings = [])
 */
class CandidaturasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Puestos', 'Convocados']
        ];
        $candidaturas = $this->paginate($this->Candidaturas);

        $this->set(compact('candidaturas'));
        $this->set('_serialize', ['candidaturas']);
    }

    /**
     * View method
     *
     * @param string|null $id Candidatura id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $candidatura = $this->Candidaturas->get($id, [
            'contain' => ['Puestos', 'Convocados']
        ]);

        $this->set('candidatura', $candidatura);
        $this->set('_serialize', ['candidatura']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $candidatura = $this->Candidaturas->newEntity();
        if ($this->request->is('post')) {
            $candidatura = $this->Candidaturas->patchEntity($candidatura, $this->request->getData());
            if ($this->Candidaturas->save($candidatura)) {
                $this->Flash->success(__('The candidatura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidatura could not be saved. Please, try again.'));
        }
        $puestos = $this->Candidaturas->Puestos->find('list', ['limit' => 200]);
        $convocados = $this->Candidaturas->Convocados->find('list', ['limit' => 200]);
        $this->set(compact('candidatura', 'puestos', 'convocados'));
        $this->set('_serialize', ['candidatura']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Candidatura id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $candidatura = $this->Candidaturas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $candidatura = $this->Candidaturas->patchEntity($candidatura, $this->request->getData());
            if ($this->Candidaturas->save($candidatura)) {
                $this->Flash->success(__('The candidatura has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The candidatura could not be saved. Please, try again.'));
        }
        $puestos = $this->Candidaturas->Puestos->find('list', ['limit' => 200]);
        $convocados = $this->Candidaturas->Convocados->find('list', ['limit' => 200]);
        $this->set(compact('candidatura', 'puestos', 'convocados'));
        $this->set('_serialize', ['candidatura']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Candidatura id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $candidatura = $this->Candidaturas->get($id);
        if ($this->Candidaturas->delete($candidatura)) {
            $this->Flash->success(__('The candidatura has been deleted.'));
        } else {
            $this->Flash->error(__('The candidatura could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
