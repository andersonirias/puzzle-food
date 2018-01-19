<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Mesas Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Estabelecimentos
 *
 * @method \App\Model\Entity\Mesa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Mesa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Mesa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Mesa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Mesa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Mesa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Mesa findOrCreate($search, callable $callback = null)
 */
class MesasTable extends Table
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

        $this->table('mesas');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Estabelecimentos', [
            'foreignKey' => 'estabelecimentos_id',
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
            ->integer('quant_pessoas')
            ->requirePresence('quant_pessoas', 'create')
            ->notEmpty('quant_pessoas');

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
        $rules->add($rules->existsIn(['estabelecimentos_id'], 'Estabelecimentos'));

        return $rules;
    }
}
