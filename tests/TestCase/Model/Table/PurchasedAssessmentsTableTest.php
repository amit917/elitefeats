<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PurchasedAssessmentsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PurchasedAssessmentsTable Test Case
 */
class PurchasedAssessmentsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PurchasedAssessmentsTable
     */
    public $PurchasedAssessments;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PurchasedAssessments',
        'app.Assessment',
        'app.Users',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PurchasedAssessments') ? [] : ['className' => PurchasedAssessmentsTable::class];
        $this->PurchasedAssessments = TableRegistry::getTableLocator()->get('PurchasedAssessments', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PurchasedAssessments);

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
