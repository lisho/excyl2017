<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nominas Controller
 *
 * @property \App\Model\Table\NominasTable $Nominas
 *
 * @method \App\Model\Entity\Nomina[] paginate($object = null, array $settings = [])
 */
class NominasController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $nominas = $this->paginate($this->Nominas);

        $this->set(compact('nominas'));
        $this->set('_serialize', ['nominas']);
    }

    /**
     * View method
     *
     * @param string|null $id Nomina id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nomina = $this->Nominas->get($id, [
            'contain' => ['Convocados']
        ]);

        $this->set('nomina', $nomina);
        $this->set('_serialize', ['nomina']);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $nomina = $this->Nominas->newEntity();
        if ($this->request->is('post')) {
            $nomina = $this->Nominas->patchEntity($nomina, $this->request->getData());
            if ($this->Nominas->save($nomina)) {
                $this->Flash->success(__('The nomina has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nomina could not be saved. Please, try again.'));
        }
        $this->set(compact('nomina'));
        $this->set('_serialize', ['nomina']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nomina id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nomina = $this->Nominas->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nomina = $this->Nominas->patchEntity($nomina, $this->request->getData());
            if ($this->Nominas->save($nomina)) {
                $this->Flash->success(__('The nomina has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The nomina could not be saved. Please, try again.'));
        }
        $this->set(compact('nomina'));
        $this->set('_serialize', ['nomina']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Nomina id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nomina = $this->Nominas->get($id);
        if ($this->Nominas->delete($nomina)) {
            $this->Flash->success(__('The nomina has been deleted.'));
        } else {
            $this->Flash->error(__('The nomina could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
