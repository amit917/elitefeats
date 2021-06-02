<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Athlete Entity
 *
 * @property int $athlete_id
 * @property string $first_name
 * @property string $last_name
 * @property int $age
 * @property int $phone
 * @property string $email
 * @property int|null $sports_id
 * @property int|null $module_id
 * @property int|null $asses_id
 *
 * @property \App\Model\Entity\Sport $sport
 * @property \App\Model\Entity\Module $module
 * @property \App\Model\Entity\Assessment $assessment
 */
class Athlete extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'first_name' => true,
        'last_name' => true,
        'age' => true,
        'phone' => true,
        'email' => true,
        'sports_id' => true,
        'module_id' => true,
        'asses_id' => true,
        'sport' => true,
        'module' => true,
        'assessment' => true,
    ];
}
