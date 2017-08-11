<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductSubCategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductSubCategoriesTable Test Case
 */
class ProductSubCategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductSubCategoriesTable
     */
    public $ProductSubCategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.product_sub_categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('ProductSubCategories') ? [] : ['className' => 'App\Model\Table\ProductSubCategoriesTable'];
        $this->ProductSubCategories = TableRegistry::get('ProductSubCategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductSubCategories);

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
