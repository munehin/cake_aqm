<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SendlogsFixture
 */
class SendlogsFixture extends TestFixture
{
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id' => 1,
                'changed' => '2022-04-01 12:09:04',
                'ctipath' => 'Lorem ipsum dolor sit amet',
                'ctifile' => 'Lorem ipsum dolor sit amet',
                'wavpath' => 'Lorem ipsum dolor sit amet',
                'status' => 1,
                'uploadlog_id' => 1,
                'calldatetime' => '2022-04-01 12:09:04',
                'processedondate' => '2022-04-01 12:09:04',
                'disposition' => 'Lorem ipsum dolor sit amet',
                'created' => '2022-04-01 12:09:04',
                'modified' => '2022-04-01 12:09:04',
            ],
        ];
        parent::init();
    }
}
