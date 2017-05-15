<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Suspensions Controller
 *
 * @property \App\Model\Table\SuspensionsTable $Suspensions
 *
 * @method \App\Model\Entity\Suspension[] paginate($object = null, array $settings = [])
 */
class SuspensionsController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $suspensions = $this->paginate($this->Suspensions);

        $this->set(compact('suspensions'));
        $this->set('_serialize', ['suspensions']);
    }

    /**
     * View method
     *
     * @param string|null $id Suspension id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $suspension = $this->Suspensions->get($id, [
            'contain' => []
        ]);

        $this->set('suspension', $suspension);
        $this->set('_serialize', ['suspension']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $suspension = $this->Suspensions->newEntity();
        if ($this->request->is('post')) {
            $suspension = $this->Suspensions->patchEntity($suspension, $this->request->getData());
            if ($this->Suspensions->save($suspension)) {
                $this->Flash->success(__('The suspension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suspension could not be saved. Please, try again.'));
        }
        $this->set(compact('suspension'));
        $this->set('_serialize', ['suspension']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Suspension id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $suspension = $this->Suspensions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $suspension = $this->Suspensions->patchEntity($suspension, $this->request->getData());
            if ($this->Suspensions->save($suspension)) {
                $this->Flash->success(__('The suspension has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The suspension could not be saved. Please, try again.'));
        }
        $this->set(compact('suspension'));
        $this->set('_serialize', ['suspension']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Suspension id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $suspension = $this->Suspensions->get($id);
        if ($this->Suspensions->delete($suspension)) {
            $this->Flash->success(__('The suspension has been deleted.'));
        } else {
            $this->Flash->error(__('The suspension could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
