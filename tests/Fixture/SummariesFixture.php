<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * SummariesFixture
 */
class SummariesFixture extends TestFixture
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
                'uploaded' => '2022-04-27',
                'count' => 1,
                'ok' => 1,
                'ng' => 1,
                'wavsize' => 1,
                'created' => '2022-04-27 14:42:21',
                'modified' => '2022-04-27 14:42:21',
            ],
        ];
        parent::init();
    }
}
