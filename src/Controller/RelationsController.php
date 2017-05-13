<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Relations Controller
 *
 * @property \App\Model\Table\RelationsTable $Relations
 *
 * @method \App\Model\Entity\Relation[] paginate($object = null, array $settings = [])
 */
class RelationsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $relations = $this->paginate($this->Relations);

        $this->set(compact('relations'));
        $this->set('_serialize', ['relations']);
    }

    /**
     * View method
     *
     * @param string|null $id Relation id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $relation = $this->Relations->get($id, [
            'contain' => ['Participantes']
        ]);

        $this->set('relation', $relation);
        $this->set('_serialize', ['relation']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $relation = $this->Relations->newEntity();
        if ($this->request->is('post')) {
            $relation = $this->Relations->patchEntity($relation, $this->request->getData());
            if ($this->Relations->save($relation)) {
                $this->Flash->success(__('The relation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The relation could not be saved. Please, try again.'));
        }
        $this->set(compact('relation'));
        $this->set('_serialize', ['relation']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Relation id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $relation = $this->Relations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $relation = $this->Relations->patchEntity($relation, $this->request->getData());
            if ($this->Relations->save($relation)) {
                $this->Flash->success(__('The relation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The relation could not be saved. Please, try again.'));
        }
        $this->set(compact('relation'));
        $this->set('_serialize', ['relation']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Relation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $relation = $this->Relations->get($id);
        if ($this->Relations->delete($relation)) {
            $this->Flash->success(__('The relation has been deleted.'));
        } else {
            $this->Flash->error(__('The relation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
