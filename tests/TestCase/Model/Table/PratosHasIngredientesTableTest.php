<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PratosHasIngredientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PratosHasIngredientesTable Test Case
 */
class PratosHasIngredientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PratosHasIngredientesTable
     */
    public $PratosHasIngredientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.pratos_has_ingredientes',
        'app.pratos',
        'app.categorias',
        'app.ingredientes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('PratosHasIngredientes') ? [] : ['className' => 'App\Model\Table\PratosHasIngredientesTable'];
        $this->PratosHasIngredientes = TableRegistry::get('PratosHasIngredientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PratosHasIngredientes);

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
