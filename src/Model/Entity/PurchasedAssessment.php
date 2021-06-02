<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PurchasedAssessment Entity
 *
 * @property int $id
 * @property int $assessment_id
 * @property int $user_id
 * @property int|null $quantity
 *
 * @property \App\Model\Entity\Assessment $assessment
 * @property \App\Model\Entity\User $user
 */
class PurchasedAssessment extends Entity
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
        'assessment_id' => true,
        'user_id' => true,
        'quantity' => true,
        'assessment' => true,
        'user' => true,
    ];
}
