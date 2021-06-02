<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CompletedAssessmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CompletedAssessmentsTable Test Case
 */
class CompletedAssessmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CompletedAssessmentsTable
     */
    public $CompletedAssessments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CompletedAssessments',
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
        $config = TableRegistry::getTableLocator()->exists('CompletedAssessments') ? [] : ['className' => CompletedAssessmentsTable::class];
        $this->CompletedAssessments = TableRegistry::getTableLocator()->get('CompletedAssessments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CompletedAssessments);

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
