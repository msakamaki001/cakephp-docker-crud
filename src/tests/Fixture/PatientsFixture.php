<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PatientsFixture
 */
class PatientsFixture extends TestFixture
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
                'patient_number' => 'Lorem ipsum dolor sit amet',
                'name' => 'Lorem ipsum dolor sit amet',
                'kana' => 'Lorem ipsum dolor sit amet',
                'birth_date' => '2026-11-22',
                'insurance_rate' => 1,
                'created' => '2026-11-22 07:15:46',
                'modified' => '2026-11-22 07:15:46',
                'updated_id' => 1,
            ],
        ];
        parent::init();
    }
}
