<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ConsumptionTaxTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ConsumptionTaxTable Test Case
 */
class ConsumptionTaxTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\ConsumptionTaxTable
     */
    public $ConsumptionTax;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ConsumptionTax',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('ConsumptionTax') ? [] : ['className' => ConsumptionTaxTable::class];
        $this->ConsumptionTax = TableRegistry::getTableLocator()->get('ConsumptionTax', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ConsumptionTax);

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
