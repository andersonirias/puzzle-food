<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PedidosHasPratosFixture
 *
 */
class PedidosHasPratosFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pedidos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'pratos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_pedidos_has_pratos_pedidos1_idx' => ['type' => 'index', 'columns' => ['pedidos_id'], 'length' => []],
            'fk_pedidos_has_pratos_pratos1_idx' => ['type' => 'index', 'columns' => ['pratos_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_pedidos_has_pratos_pedidos1' => ['type' => 'foreign', 'columns' => ['pedidos_id'], 'references' => ['pedidos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_pedidos_has_pratos_pratos1' => ['type' => 'foreign', 'columns' => ['pratos_id'], 'references' => ['pratos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Records
     *
     * @var array
     */
    public $records = [
        [
            'id' => 1,
            'pedidos_id' => 1,
            'pratos_id' => 1
        ],
    ];
}
