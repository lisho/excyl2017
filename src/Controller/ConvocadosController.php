<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Convocados Controller
 *
 * @property \App\Model\Table\ConvocadosTable $Convocados
 *
 * @method \App\Model\Entity\Convocado[] paginate($object = null, array $settings = [])
 */
class ConvocadosController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Nominas', 'Expedientes']
        ];
        $convocados = $this->paginate($this->Convocados);

        $this->set(compact('convocados'));
        $this->set('_serialize', ['convocados']);
    }

    /**
     * View method
     *
     * @param string|null $id Convocado id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $convocado = $this->Convocados->get($id, [
            'contain' => ['Nominas', 'Expedientes', 'Candidaturas', 'Valoracions']
        ]);

        $this->set('convocado', $convocado);
        $this->set('_serialize', ['convocado']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $convocado = $this->Convocados->newEntity();
        if ($this->request->is('post')) {
            $convocado = $this->Convocados->patchEntity($convocado, $this->request->getData());
            if ($this->Convocados->save($convocado)) {
                $this->Flash->success(__('The convocado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The convocado could not be saved. Please, try again.'));
        }
        $nominas = $this->Convocados->Nominas->find('list', ['limit' => 200]);
        $expedientes = $this->Convocados->Expedientes->find('list', ['limit' => 200]);
        $this->set(compact('convocado', 'nominas', 'expedientes'));
        $this->set('_serialize', ['convocado']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Convocado id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $convocado = $this->Convocados->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $convocado = $this->Convocados->patchEntity($convocado, $this->request->getData());
            if ($this->Convocados->save($convocado)) {
                $this->Flash->success(__('The convocado has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The convocado could not be saved. Please, try again.'));
        }
        $nominas = $this->Convocados->Nominas->find('list', ['limit' => 200]);
        $expedientes = $this->Convocados->Expedientes->find('list', ['limit' => 200]);
        $this->set(compact('convocado', 'nominas', 'expedientes'));
        $this->set('_serialize', ['convocado']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Convocado id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $convocado = $this->Convocados->get($id);
        if ($this->Convocados->delete($convocado)) {
            $this->Flash->success(__('The convocado has been deleted.'));
        } else {
            $this->Flash->error(__('The convocado could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
