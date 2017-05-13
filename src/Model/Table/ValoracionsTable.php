<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Valoracions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Convocados
 *
 * @method \App\Model\Entity\Valoracion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Valoracion newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Valoracion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Valoracion|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Valoracion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Valoracion[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Valoracion findOrCreate($search, callable $callback = null, $options = [])
 */
class ValoracionsTable extends Table
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

        $this->setTable('valoracions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

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
            ->requirePresence('puede', 'create')
            ->notEmpty('puede');

        $validator
            ->requirePresence('sabe', 'create')
            ->notEmpty('sabe');

        $validator
            ->requirePresence('quere', 'create')
            ->notEmpty('quere');

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
        $rules->add($rules->existsIn(['convocado_id'], 'Convocados'));

        return $rules;
    }
}
