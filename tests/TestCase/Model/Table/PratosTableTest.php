<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PratosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PratosTable Test Case
 */
class PratosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PratosTable
     */
    public $Pratos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Pratos') ? [] : ['className' => 'App\Model\Table\PratosTable'];
        $this->Pratos = TableRegistry::get('Pratos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Pratos);

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
