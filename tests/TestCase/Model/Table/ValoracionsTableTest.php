<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ValoracionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ValoracionsTable Test Case
 */
class ValoracionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ValoracionsTable
     */
    public $Valoracions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.valoracions',
        'app.convocados',
        'app.nominas',
        'app.expedientes',
        'app.participantes',
        'app.relations',
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
        $config = TableRegistry::exists('Valoracions') ? [] : ['className' => 'App\Model\Table\ValoracionsTable'];
        $this->Valoracions = TableRegistry::get('Valoracions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Valoracions);

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
