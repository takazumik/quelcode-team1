<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PointHistoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PointHistoriesTable Test Case
 */
class PointHistoriesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PointHistoriesTable
     */
    public $PointHistories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.PointHistories',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('PointHistories') ? [] : ['className' => PointHistoriesTable::class];
        $this->PointHistories = TableRegistry::getTableLocator()->get('PointHistories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->PointHistories);

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
