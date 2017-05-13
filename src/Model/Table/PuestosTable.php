<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Puestos Model
 *
 * @property \Cake\ORM\Association\HasMany $Candidaturas
 *
 * @method \App\Model\Entity\Puesto get($primaryKey, $options = [])
 * @method \App\Model\Entity\Puesto newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Puesto[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Puesto|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Puesto patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Puesto[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Puesto findOrCreate($search, callable $callback = null, $options = [])
 */
class PuestosTable extends Table
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

        $this->setTable('puestos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Candidaturas', [
            'foreignKey' => 'puesto_id'
        ]);
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
            ->requirePresence('puesto', 'create')
            ->notEmpty('puesto');

        $validator
            ->requirePresence('descripcion', 'create')
            ->notEmpty('descripcion');

        return $validator;
    }
}
