<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilapedidosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilapedidosTable Test Case
 */
class FilapedidosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FilapedidosTable
     */
    public $Filapedidos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.filapedidos',
        'app.pedidos',
        'app.consumidores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Filapedidos') ? [] : ['className' => 'App\Model\Table\FilapedidosTable'];
        $this->Filapedidos = TableRegistry::get('Filapedidos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Filapedidos);

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
