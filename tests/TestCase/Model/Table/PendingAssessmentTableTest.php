<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PendingAssessmentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PendingAssessmentTable Test Case
 */
class PendingAssessmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PendingAssessmentTable
     */
    public $PendingAssessment;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PendingAssessment',
        'app.Assessment',
        'app.Clients',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PendingAssessment') ? [] : ['className' => PendingAssessmentTable::class];
        $this->PendingAssessment = TableRegistry::getTableLocator()->get('PendingAssessment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PendingAssessment);

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
