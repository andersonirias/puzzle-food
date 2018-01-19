<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Ingredientes Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\Ingrediente get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ingrediente newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ingrediente[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ingrediente|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ingrediente patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ingrediente[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ingrediente findOrCreate($search, callable $callback = null)
 */
class IngredientesTable extends Table
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

        $this->table('ingredientes');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categorias_id',
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
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->requirePresence('descricao', 'create')
            ->notEmpty('descricao');

        $validator
            ->integer('estoque')
            ->requirePresence('estoque', 'create')
            ->notEmpty('estoque');

        $validator
            ->dateTime('criacao')
            ->requirePresence('criacao', 'create')
            ->notEmpty('criacao');

        $validator
            ->boolean('adicional')
            ->requirePresence('adicional', 'create')
            ->notEmpty('adicional');

        $validator
            ->numeric('valor')
            ->requirePresence('valor', 'create')
            ->notEmpty('valor');

        $validator
            ->allowEmpty('imagem');

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
        $rules->add($rules->existsIn(['categorias_id'], 'Categorias'));

        return $rules;
    }
}
