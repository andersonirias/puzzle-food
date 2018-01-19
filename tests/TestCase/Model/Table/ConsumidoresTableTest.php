<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsumidoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsumidoresTable Test Case
 */
class ConsumidoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsumidoresTable
     */
    public $Consumidores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
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
        $config = TableRegistry::exists('Consumidores') ? [] : ['className' => 'App\Model\Table\ConsumidoresTable'];
        $this->Consumidores = TableRegistry::get('Consumidores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Consumidores);

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
