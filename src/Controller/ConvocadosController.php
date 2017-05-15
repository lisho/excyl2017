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

    /**
     * Añadir nuevos convocados
     *
     * 
     */

    public function subirConvocados()
    {           
        $convocado = $this->Convocados->newEntity();
        $cuenta_convocados = 0;
        $cuenta_fallos = 0;
        $líneas = [];
        $keys = ['dni','apellidos','nombre','telefono','nomina_id','expediente_id'];

        //verificamos si hay un post

         if ($this->request->is('post') && $this->request->data['convocado']['tmp_name']!='') {
            $puesto = $this->request->data['codigo'];
            $csv = $this->request->data['convocado'];
            $filename = $csv['tmp_name'];
            $lineas = file($filename);
            unset($lineas[0], $lineas[1], $lineas[2]);
            foreach ($lineas as $linea_num => $linea){        
                $data = [];
                $datos = [];
                $linea = str_replace(",", ";", $linea);

                    $datos = explode(';',$linea); // separamnos los datos de cada fila
                    $data = array_combine($keys,$datos); // los combinamos con las keys de la BD

                    foreach ($data as $k => $d) { $data[$k] = trim($d);} //eliminamos los espacios del principio y del final.

                    /* Comprobamos si ya exixte ese convocado para que no se repitan personas*/

                    $comprueba_convocado = $this->Convocados->find('all', ['conditions' => [
                            'dni' => $data['dni'],
                        ]
                    ]);
                    $comprobado = $comprueba_convocado->toArray();
//debug($comprobado[0]['id']);exit();
                    if (empty($comprueba_convocado->toArray())) {
                        
                        $convocado = $this->Convocados->newEntity();
                        $convocado = $this->Convocados->patchEntity($convocado, $data);
                        $u=$this->Convocados->save($convocado);

                        if ($u) {
                            $cuenta_convocados++;

                            $this->compruebaCandidatura($u['id'],$puesto);
                              
//debug($u);exit();
                        } else {
                            $this->Flash->error(__('The nomina could not be saved. Please, try again.'));

                        }
                    } else {
                        $cuenta_fallos++;
                        $this->compruebaCandidatura($comprobado[0]['id'],$puesto);
                        $this->Flash->error('Error al cargar la nomina:'.$linea.'. Puede que ya exista en la base.');
                    }  
            }
        }

        $this->set(compact('convocado'));
        //$this->set('_serialize', ['convocado']);
    }


    public function compruebaCandidatura($id = null, $puesto = null)
    {
        $this->loadModel('Candidaturas');
        $candidatura = $this->Candidaturas  -> find() 
                                            -> where(['convocado_id' => $id,
                                                        'puesto_id' => $puesto])
                                            -> first();
        //debug($candidatura);exit();
        if (empty($candidatura)) {
             $this->creaCandidatura($id,$puesto);
        }
        return $candidatura;
    }

    public function creaCandidatura($id = null, $puesto = null)
    {
        $this->loadModel('Candidaturas');
        $candidatura = $this->Candidaturas->newEntity();
        $data = ['convocado_id' => $id, 'puesto_id' => $puesto, 'nota'=> NULL, 'observaciones' => NULL];
        $candidatura = $this->Candidaturas->patchEntity($candidatura, $data);
        
        //debug($data);
        //debug($candidatura);exit();

        if ($this->Candidaturas->save($candidatura)) {
            $this->Flash->success(__('se ha creado correctamente la candidatura'));
        }else{
            $this->Flash->error(__('The candidatura could not be saved. Please, try again.'));
        }
    }

    public function listados()
    {
        $lista_expedientes=[];
        $convocados = $this->Convocados->find('all')
                        -> contain(['Candidaturas.Puestos'])
                        ;
        $lista_convocados = $this->Convocados   ->find()
                                                ->extract('dni')
                                                ->toArray();
        $dni_nomina = $this->dniNomina();
        $dni_suspensiones = $this->dniSuspensiones();
        $expedientes = $this->listaExpedientes();

        foreach ($expedientes as $e) {
            if (in_array($e['dni'], $lista_convocados)){
                $lista_expedientes[$e['dni']]=$e['expediente'];
            }
        }

//debug($convocados);               
//debug(json_encode($convocados));
//exit();

        $this->set(compact('convocados','dni_nomina','dni_suspensiones','lista_expedientes'));
        $this->set('_serialize', ['convocados']);
    }

    public function contrastarNomina($dni=null)
    {

        $this->loadModel("Nominas");
        $contraste = $this->nominas->find()
                                    -> where(['dni' => $dni])
                                    -> first();
        if ($contraste) {
            return TRUE;
        } else { return FALSE;}
        
    }

    public function dniNomina()
    {
        $this->loadModel("Nominas");
        $lista = $this->Nominas->find()
                                ->combine('dni','CLASIFICACION');
        return $lista->toArray();

    }

    public function dniSuspensiones()
    {
        $this->loadModel("Suspensions");
        $lista = $this->Suspensions->find()
                                //->extract('dni')
                                -> combine('dni','CLASIFICACION');
        return $lista->toArray();

    }

    public function listaExpedientes()
    {
        $this->loadModel("Participantes");
        $expedientes = $this->Participantes->find()
                                -> contain(['Expedientes'])
                                //-> extract('dni')
                                ;
        //debug($expedientes);exit();
        return $expedientes->toArray();
    }
}
