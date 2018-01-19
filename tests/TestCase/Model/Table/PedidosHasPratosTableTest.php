<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PedidosHasPratosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PedidosHasPratosTable Test Case
 */
class PedidosHasPratosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PedidosHasPratosTable
     */
    public $PedidosHasPratos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pedidos_has_pratos',
        'app.pedidos',
        'app.consumidores',
        'app.pratos',
        'app.categorias'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PedidosHasPratos') ? [] : ['className' => 'App\Model\Table\PedidosHasPratosTable'];
        $this->PedidosHasPratos = TableRegistry::get('PedidosHasPratos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PedidosHasPratos);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
