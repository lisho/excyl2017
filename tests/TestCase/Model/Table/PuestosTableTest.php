<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PuestosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PuestosTable Test Case
 */
class PuestosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PuestosTable
     */
    public $Puestos;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.puestos',
        'app.candidaturas'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Puestos') ? [] : ['className' => 'App\Model\Table\PuestosTable'];
        $this->Puestos = TableRegistry::get('Puestos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Puestos);

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
}
