<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FloorsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FloorsTable Test Case
 */
class FloorsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FloorsTable
     */
    public $Floors;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.floors',
        'app.buildings',
        'app.rooms'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Floors') ? [] : ['className' => FloorsTable::class];
        $this->Floors = TableRegistry::get('Floors', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Floors);

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
