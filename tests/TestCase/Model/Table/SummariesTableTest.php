<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SummariesTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SummariesTable Test Case
 */
class SummariesTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\SummariesTable
     */
    protected $Summaries;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Summaries',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Summaries') ? [] : ['className' => SummariesTable::class];
        $this->Summaries = $this->getTableLocator()->get('Summaries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Summaries);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\SummariesTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
