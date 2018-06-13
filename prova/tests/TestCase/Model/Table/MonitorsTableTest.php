<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MonitorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MonitorsTable Test Case
 */
class MonitorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MonitorsTable
     */
    public $Monitors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.monitors',
        'app.students'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Monitors') ? [] : ['className' => MonitorsTable::class];
        $this->Monitors = TableRegistry::getTableLocator()->get('Monitors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Monitors);

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
