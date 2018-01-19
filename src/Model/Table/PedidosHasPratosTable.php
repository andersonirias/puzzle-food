<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PedidosHasPratos Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Pedidos
 * @property \Cake\ORM\Association\BelongsTo $Pratos
 *
 * @method \App\Model\Entity\PedidosHasPrato get($primaryKey, $options = [])
 * @method \App\Model\Entity\PedidosHasPrato newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PedidosHasPrato[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PedidosHasPrato|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PedidosHasPrato patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PedidosHasPrato[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PedidosHasPrato findOrCreate($search, callable $callback = null)
 */
class PedidosHasPratosTable extends Table
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

        $this->table('pedidos_has_pratos');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->belongsTo('Pedidos', [
            'foreignKey' => 'pedidos_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Pratos', [
            'foreignKey' => 'pratos_id',
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
        $rules->add($rules->existsIn(['pedidos_id'], 'Pedidos'));
        $rules->add($rules->existsIn(['pratos_id'], 'Pratos'));

        return $rules;
    }
}
