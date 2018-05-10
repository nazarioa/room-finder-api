<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BuildingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BuildingsTable Test Case
 */
class BuildingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\BuildingsTable
     */
    public $Buildings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.buildings',
        'app.maps',
        'app.floors'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Buildings') ? [] : ['className' => BuildingsTable::class];
        $this->Buildings = TableRegistry::get('Buildings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Buildings);

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
