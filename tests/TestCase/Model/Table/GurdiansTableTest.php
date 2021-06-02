<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\GurdiansTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\GurdiansTable Test Case
 */
class GurdiansTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\GurdiansTable
     */
    public $Gurdians;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Gurdians',
        'app.Children',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Gurdians') ? [] : ['className' => GurdiansTable::class];
        $this->Gurdians = TableRegistry::getTableLocator()->get('Gurdians', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Gurdians);

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
