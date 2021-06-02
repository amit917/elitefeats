<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\AssessmentTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\AssessmentTable Test Case
 */
class AssessmentTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\AssessmentTable
     */
    public $Assessment;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Assessment',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Assessment') ? [] : ['className' => AssessmentTable::class];
        $this->Assessment = TableRegistry::getTableLocator()->get('Assessment', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Assessment);

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
