<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Expedientes Model
 *
 * @property \Cake\ORM\Association\HasMany $Convocados
 * @property \Cake\ORM\Association\HasMany $Participantes
 *
 * @method \App\Model\Entity\Expediente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Expediente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Expediente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Expediente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Expediente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Expediente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Expediente findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ExpedientesTable extends Table
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

        $this->setTable('expedientes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Convocados', [
            'foreignKey' => 'expediente_id'
        ]);
        $this->hasMany('Participantes', [
            'foreignKey' => 'expediente_id'
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
            ->allowEmpty('numedis');

        $validator
            ->requirePresence('numhs', 'create')
            ->notEmpty('numhs');

        $validator
            ->allowEmpty('ceas');

        $validator
            ->allowEmpty('domicilio');

        $validator
            ->allowEmpty('observaciones');

        return $validator;
    }
}
