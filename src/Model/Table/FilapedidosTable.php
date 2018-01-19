<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Filapedidos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pedidos
 *
 * @method \App\Model\Entity\Filapedido get($primaryKey, $options = [])
 * @method \App\Model\Entity\Filapedido newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Filapedido[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Filapedido|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Filapedido patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Filapedido[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Filapedido findOrCreate($search, callable $callback = null)
 */
class FilapedidosTable extends Table
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

        $this->table('filapedidos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Pedidos', [
            'foreignKey' => 'pedidos_id',
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
            ->dateTime('chegada')
            ->requirePresence('chegada', 'create')
            ->notEmpty('chegada');

        $validator
            ->requirePresence('status', 'create')
            ->notEmpty('status');

        $validator
            ->allowEmpty('observacoes');

        $validator
            ->integer('posicao')
            ->requirePresence('posicao', 'create')
            ->notEmpty('posicao');

        $validator
            ->dateTime('saida')
            ->requirePresence('saida', 'create')
            ->notEmpty('saida');

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
        $rules->add($rules->existsIn(['pedidos_id'], 'Pedidos'));

        return $rules;
    }
}
