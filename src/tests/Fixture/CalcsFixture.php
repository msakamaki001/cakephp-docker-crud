<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CalcsFixture
 */
class CalcsFixture extends TestFixture
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
                'patient_id' => 1,
                'point_id' => 1,
                'one_point_yen' => 1,
                'out_of_pocket_medical_expenses' => 1,
                'created' => '2026-11-22',
                'modified' => '2026-11-22',
                'updated_id' => 1,
            ],
        ];
        parent::init();
    }
}
