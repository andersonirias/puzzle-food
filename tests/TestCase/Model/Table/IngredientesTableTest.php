<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\IngredientesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\IngredientesTable Test Case
 */
class IngredientesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\IngredientesTable
     */
    public $Ingredientes;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ingredientes',
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
        $config = TableRegistry::exists('Ingredientes') ? [] : ['className' => 'App\Model\Table\IngredientesTable'];
        $this->Ingredientes = TableRegistry::get('Ingredientes', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Ingredientes);

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
