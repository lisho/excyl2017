<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Suspensions Model
 *
 * @method \App\Model\Entity\Suspension get($primaryKey, $options = [])
 * @method \App\Model\Entity\Suspension newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Suspension[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Suspension|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Suspension patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Suspension[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Suspension findOrCreate($search, callable $callback = null, $options = [])
 */
class SuspensionsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('suspensions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('provincia', 'create')
            ->notEmpty('provincia');

        $validator
            ->requirePresence('CCLL', 'create')
            ->notEmpty('CCLL');

        $validator
            ->requirePresence('CEAS', 'create')
            ->notEmpty('CEAS');

        $validator
            ->requirePresence('HS', 'create')
            ->notEmpty('HS');

        $validator
            ->requirePresence('UC', 'create')
            ->notEmpty('UC');

        $validator
            ->requirePresence('RGC', 'create')
            ->notEmpty('RGC');

        $validator
            ->requirePresence('CLASIFICACION', 'create')
            ->notEmpty('CLASIFICACION');

        $validator
            ->requirePresence('MIEMBROS', 'create')
            ->notEmpty('MIEMBROS');

        $validator
            ->requirePresence('dni', 'create')
            ->notEmpty('dni');

        $validator
            ->requirePresence('nombrecompleto', 'create')
            ->notEmpty('nombrecompleto');

        $validator
            ->requirePresence('SEXO', 'create')
            ->notEmpty('SEXO');

        $validator
            ->requirePresence('EDAD', 'create')
            ->notEmpty('EDAD');

        $validator
            ->requirePresence('NACIONALIDAD', 'create')
            ->notEmpty('NACIONALIDAD');

        $validator
            ->requirePresence('DOMICILIO', 'create')
            ->notEmpty('DOMICILIO');

        $validator
            ->date('fechatramite')
            ->requirePresence('fechatramite', 'create')
            ->notEmpty('fechatramite');

        $validator
            ->requirePresence('RESOLUCION', 'create')
            ->notEmpty('RESOLUCION');

        $validator
            ->date('fechaefectos')
            ->requirePresence('fechaefectos', 'create')
            ->notEmpty('fechaefectos');

        $validator
            ->requirePresence('relacion', 'create')
            ->notEmpty('relacion');

        $validator
            ->requirePresence('fechanomina', 'create')
            ->notEmpty('fechanomina');

        return $validator;
    }
}
