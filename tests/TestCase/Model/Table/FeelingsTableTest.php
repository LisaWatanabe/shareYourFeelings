<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FeelingsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FeelingsTable Test Case
 */
class FeelingsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\FeelingsTable
     */
    protected $Feelings;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Feelings',
        'app.Users',
        'app.Statuses',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Feelings') ? [] : ['className' => FeelingsTable::class];
        $this->Feelings = $this->getTableLocator()->get('Feelings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Feelings);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
