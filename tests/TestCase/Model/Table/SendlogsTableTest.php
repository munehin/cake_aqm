<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SendlogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SendlogsTable Test Case
 */
class SendlogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SendlogsTable
     */
    protected $Sendlogs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Sendlogs',
        'app.Uploadlogs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Sendlogs') ? [] : ['className' => SendlogsTable::class];
        $this->Sendlogs = $this->getTableLocator()->get('Sendlogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Sendlogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SendlogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\SendlogsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
