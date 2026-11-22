<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PointsFixture
 */
class PointsFixture extends TestFixture
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
                'medical_details' => 'Lorem ipsum dolor sit amet',
                'point' => 1,
                'created' => '2026-11-22',
                'modified' => '2026-11-22',
                'updated_id' => 1,
            ],
        ];
        parent::init();
    }
}
