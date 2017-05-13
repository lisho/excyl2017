<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConvocadosTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConvocadosTable Test Case
 */
class ConvocadosTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ConvocadosTable
     */
    public $Convocados;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.convocados',
        'app.nominas',
        'app.expedientes',
        'app.candidaturas',
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
        $config = TableRegistry::exists('Convocados') ? [] : ['className' => 'App\Model\Table\ConvocadosTable'];
        $this->Convocados = TableRegistry::get('Convocados', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Convocados);

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
