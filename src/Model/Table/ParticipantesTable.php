<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Participantes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Relations
 * @property \Cake\ORM\Association\BelongsTo $Expedientes
 *
 * @method \App\Model\Entity\Participante get($primaryKey, $options = [])
 * @method \App\Model\Entity\Participante newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Participante[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Participante|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Participante patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Participante[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Participante findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ParticipantesTable extends Table
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

        $this->setTable('participantes');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Relations', [
            'foreignKey' => 'relation_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Expedientes', [
            'foreignKey' => 'expediente_id',
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
            ->allowEmpty('dni');

        $validator
            ->allowEmpty('sexo');

        $validator
            ->allowEmpty('nombre');

        $validator
            ->allowEmpty('apellidos');

        $validator
            ->allowEmpty('telefono');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');

        $validator
            ->allowEmpty('foto');

        $validator
            ->allowEmpty('observaciones');

        $validator
            ->date('nacimiento')
            ->allowEmpty('nacimiento');

        $validator
            ->boolean('desactivado')
            ->requirePresence('desactivado', 'create')
            ->notEmpty('desactivado');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['relation_id'], 'Relations'));
        $rules->add($rules->existsIn(['expediente_id'], 'Expedientes'));

        return $rules;
    }
}
