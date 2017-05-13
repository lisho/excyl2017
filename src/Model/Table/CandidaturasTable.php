<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Candidaturas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Puestos
 * @property \Cake\ORM\Association\BelongsTo $Convocados
 *
 * @method \App\Model\Entity\Candidatura get($primaryKey, $options = [])
 * @method \App\Model\Entity\Candidatura newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Candidatura[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Candidatura|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Candidatura patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Candidatura[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Candidatura findOrCreate($search, callable $callback = null, $options = [])
 */
class CandidaturasTable extends Table
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

        $this->setTable('candidaturas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Puestos', [
            'foreignKey' => 'puesto_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Convocados', [
            'foreignKey' => 'convocado_id',
            'joinType' => 'INNER'
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
            ->integer('nota')
            ->requirePresence('nota', 'create')
            ->notEmpty('nota');

        $validator
            ->requirePresence('observaciones', 'create')
            ->notEmpty('observaciones');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['puesto_id'], 'Puestos'));
        $rules->add($rules->existsIn(['convocado_id'], 'Convocados'));

        return $rules;
    }
}
