<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Calc Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property int $point_id
 * @property int $one_point_yen
 * @property float $out_of_pocket_medical_expenses
 * @property \Cake\I18n\Date $created
 * @property \Cake\I18n\Date $modified
 * @property int|null $updated_id
 *
 * @property \App\Model\Entity\Point $point
 */
class Calc extends Entity
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
        'patient_id' => true,
        'point_id' => true,
        'one_point_yen' => true,
        'out_of_pocket_medical_expenses' => true,
        'created' => true,
        'modified' => true,
        'updated_id' => true,
        'point' => true,
    ];
}
