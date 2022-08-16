<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\UploadlogsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\UploadlogsTable Test Case
 */
class UploadlogsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\UploadlogsTable
     */
    protected $Uploadlogs;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Uploadlogs',
        'app.Jobs',
        'app.Sendlogs',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Uploadlogs') ? [] : ['className' => UploadlogsTable::class];
        $this->Uploadlogs = $this->getTableLocator()->get('Uploadlogs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Uploadlogs);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     * @uses \App\Model\Table\UploadlogsTable::validationDefault()
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     * @uses \App\Model\Table\UploadlogsTable::buildRules()
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
