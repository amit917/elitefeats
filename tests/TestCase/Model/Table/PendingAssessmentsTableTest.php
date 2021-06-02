<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PendingAssessmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PendingAssessmentsTable Test Case
 */
class PendingAssessmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PendingAssessmentsTable
     */
    public $PendingAssessments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PendingAssessments',
        'app.Assessments',
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
        $config = TableRegistry::getTableLocator()->exists('PendingAssessments') ? [] : ['className' => PendingAssessmentsTable::class];
        $this->PendingAssessments = TableRegistry::getTableLocator()->get('PendingAssessments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PendingAssessments);

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
