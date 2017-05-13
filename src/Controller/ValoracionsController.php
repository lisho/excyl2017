<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Valoracions Controller
 *
 * @property \App\Model\Table\ValoracionsTable $Valoracions
 *
 * @method \App\Model\Entity\Valoracion[] paginate($object = null, array $settings = [])
 */
class ValoracionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Convocados']
        ];
        $valoracions = $this->paginate($this->Valoracions);

        $this->set(compact('valoracions'));
        $this->set('_serialize', ['valoracions']);
    }

    /**
     * View method
     *
     * @param string|null $id Valoracion id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $valoracion = $this->Valoracions->get($id, [
            'contain' => ['Convocados']
        ]);

        $this->set('valoracion', $valoracion);
        $this->set('_serialize', ['valoracion']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $valoracion = $this->Valoracions->newEntity();
        if ($this->request->is('post')) {
            $valoracion = $this->Valoracions->patchEntity($valoracion, $this->request->getData());
            if ($this->Valoracions->save($valoracion)) {
                $this->Flash->success(__('The valoracion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The valoracion could not be saved. Please, try again.'));
        }
        $convocados = $this->Valoracions->Convocados->find('list', ['limit' => 200]);
        $this->set(compact('valoracion', 'convocados'));
        $this->set('_serialize', ['valoracion']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Valoracion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $valoracion = $this->Valoracions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $valoracion = $this->Valoracions->patchEntity($valoracion, $this->request->getData());
            if ($this->Valoracions->save($valoracion)) {
                $this->Flash->success(__('The valoracion has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The valoracion could not be saved. Please, try again.'));
        }
        $convocados = $this->Valoracions->Convocados->find('list', ['limit' => 200]);
        $this->set(compact('valoracion', 'convocados'));
        $this->set('_serialize', ['valoracion']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Valoracion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $valoracion = $this->Valoracions->get($id);
        if ($this->Valoracions->delete($valoracion)) {
            $this->Flash->success(__('The valoracion has been deleted.'));
        } else {
            $this->Flash->error(__('The valoracion could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
