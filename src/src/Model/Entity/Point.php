<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Point Entity
 *
 * @property int $id
 * @property string $medical_details
 * @property int $point
 * @property \Cake\I18n\Date $created
 * @property \Cake\I18n\Date $modified
 * @property int $updated_id
 *
 * @property \App\Model\Entity\Calc[] $calcs
 */
class Point extends Entity
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
        'medical_details' => true,
        'point' => true,
        'created' => true,
        'modified' => true,
        'updated_id' => true,
        'calcs' => true,
    ];
}
