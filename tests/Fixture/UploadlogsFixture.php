<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * UploadlogsFixture
 */
class UploadlogsFixture extends TestFixture
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
                'uploaded' => '2022-03-24 05:27:12',
                'ctipath' => 'Lorem ipsum dolor sit amet',
                'ctifile' => 'Lorem ipsum dolor sit amet',
                'wavfile' => 'Lorem ipsum dolor sit amet',
                'wavsize' => 1,
                'wavtime' => 1,
                'clientcode' => 'Lorem ipsum do',
                'extension' => 'Lorem ipsum do',
                'job_id' => 1,
                'agentname' => 'Lorem ipsum dolor sit amet',
                'agentpbxid' => 'Lorem ipsum do',
                'status' => 1,
                'notsend' => 1,
                'created' => '2022-03-24 05:27:12',
                'modified' => '2022-03-24 05:27:12',
            ],
        ];
        parent::init();
    }
}
