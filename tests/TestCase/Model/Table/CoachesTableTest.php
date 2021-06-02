<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoachesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoachesTable Test Case
 */
class CoachesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CoachesTable
     */
    public $Coaches;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Coaches',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Coaches') ? [] : ['className' => CoachesTable::class];
        $this->Coaches = TableRegistry::getTableLocator()->get('Coaches', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coaches);

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
