<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UserRoomsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UserRoomsTable Test Case
 */
class UserRoomsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\UserRoomsTable
     */
    public $UserRooms;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.user_rooms',
        'app.users',
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
        $config = TableRegistry::exists('UserRooms') ? [] : ['className' => UserRoomsTable::class];
        $this->UserRooms = TableRegistry::get('UserRooms', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->UserRooms);

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
