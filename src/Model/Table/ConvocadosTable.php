<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Convocados Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Nominas
 * @property \Cake\ORM\Association\BelongsTo $Expedientes
 * @property \Cake\ORM\Association\HasMany $Candidaturas
 * @property \Cake\ORM\Association\HasMany $Valoracions
 *
 * @method \App\Model\Entity\Convocado get($primaryKey, $options = [])
 * @method \App\Model\Entity\Convocado newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Convocado[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Convocado|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Convocado patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Convocado[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Convocado findOrCreate($search, callable $callback = null, $options = [])
 */
class ConvocadosTable extends Table
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

        $this->setTable('convocados');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Nominas', [
            'foreignKey' => 'nomina_id'
        ]);
        $this->belongsTo('Expedientes', [
            'foreignKey' => 'expediente_id'
        ]);
        $this->hasMany('Candidaturas', [
            'foreignKey' => 'convocado_id'
        ]);
        $this->hasMany('Valoracions', [
            'foreignKey' => 'convocado_id'
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
            ->requirePresence('dni', 'create')
            ->notEmpty('dni');

        $validator
            ->requirePresence('nombre', 'create')
            ->notEmpty('nombre');

        $validator
            ->requirePresence('apellidos', 'create')
            ->notEmpty('apellidos');

        $validator
            ->allowEmpty('telefono');

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
        $rules->add($rules->existsIn(['nomina_id'], 'Nominas'));
        $rules->add($rules->existsIn(['expediente_id'], 'Expedientes'));

        return $rules;
    }
}
