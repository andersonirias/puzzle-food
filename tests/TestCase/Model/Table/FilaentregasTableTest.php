<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FilaentregasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FilaentregasTable Test Case
 */
class FilaentregasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FilaentregasTable
     */
    public $Filaentregas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.filaentregas',
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
        $config = TableRegistry::exists('Filaentregas') ? [] : ['className' => 'App\Model\Table\FilaentregasTable'];
        $this->Filaentregas = TableRegistry::get('Filaentregas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Filaentregas);

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
