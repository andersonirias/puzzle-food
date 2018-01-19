<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PratosHasIngredientesFixture
 *
 */
class PratosHasIngredientesFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'pratos_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ingredientes_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_pratos_has_ingredientes_pratos1_idx' => ['type' => 'index', 'columns' => ['pratos_id'], 'length' => []],
            'fk_pratos_has_ingredientes_ingredientes1_idx' => ['type' => 'index', 'columns' => ['ingredientes_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_pratos_has_ingredientes_pratos1' => ['type' => 'foreign', 'columns' => ['pratos_id'], 'references' => ['pratos', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_pratos_has_ingredientes_ingredientes1' => ['type' => 'foreign', 'columns' => ['ingredientes_id'], 'references' => ['ingredientes', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
            'pratos_id' => 1,
            'ingredientes_id' => 1
        ],
    ];
}
