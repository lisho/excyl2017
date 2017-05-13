<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CandidaturasTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CandidaturasTable Test Case
 */
class CandidaturasTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CandidaturasTable
     */
    public $Candidaturas;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.candidaturas',
        'app.puestos',
        'app.convocados',
        'app.nominas',
        'app.expedientes',
        'app.participantes',
        'app.relations',
        'app.valoracions'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Candidaturas') ? [] : ['className' => 'App\Model\Table\CandidaturasTable'];
        $this->Candidaturas = TableRegistry::get('Candidaturas', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Candidaturas);

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
