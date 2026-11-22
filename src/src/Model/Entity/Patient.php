<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property string $patient_number
 * @property string $name
 * @property string|null $kana
 * @property \Cake\I18n\Date|null $birth_date
 * @property float $insurance_rate
 * @property \Cake\I18n\DateTime|null $created
 * @property \Cake\I18n\DateTime|null $modified
 * @property int|null $updated_id
 *
 * @property \App\Model\Entity\Calc[] $calcs
 */
class Patient extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array<string, bool>
     */
    protected array $_accessible = [
        'patient_number' => true,
        'name' => true,
        'kana' => true,
        'birth_date' => true,
        'insurance_rate' => true,
        'created' => true,
        'modified' => true,
        'updated_id' => true,
        'calcs' => true,
    ];
}
