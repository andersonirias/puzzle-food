<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BebidasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BebidasTable Test Case
 */
class BebidasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BebidasTable
     */
    public $Bebidas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.bebidas',
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
        $config = TableRegistry::exists('Bebidas') ? [] : ['className' => 'App\Model\Table\BebidasTable'];
        $this->Bebidas = TableRegistry::get('Bebidas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Bebidas);

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
