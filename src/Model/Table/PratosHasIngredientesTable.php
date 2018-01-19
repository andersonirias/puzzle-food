<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PratosHasIngredientes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pratos
 * @property \Cake\ORM\Association\BelongsTo $Ingredientes
 *
 * @method \App\Model\Entity\PratosHasIngrediente get($primaryKey, $options = [])
 * @method \App\Model\Entity\PratosHasIngrediente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PratosHasIngrediente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PratosHasIngrediente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PratosHasIngrediente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PratosHasIngrediente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PratosHasIngrediente findOrCreate($search, callable $callback = null)
 */
class PratosHasIngredientesTable extends Table
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

        $this->table('pratos_has_ingredientes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Pratos', [
            'foreignKey' => 'pratos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Ingredientes', [
            'foreignKey' => 'ingredientes_id',
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
        $rules->add($rules->existsIn(['pratos_id'], 'Pratos'));
        $rules->add($rules->existsIn(['ingredientes_id'], 'Ingredientes'));

        return $rules;
    }
}
