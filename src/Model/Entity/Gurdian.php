<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Gurdian Entity
 *
 * @property int $parent_id
 * @property string $First Name
 * @property string $Last Name
 * @property int $phone
 * @property string $email
 * @property int|null $child_id
 *
 * @property \App\Model\Entity\Child[] $children
 * @property \App\Model\Entity\ChildGurdian[] $child_gurdians
 */
class Gurdian extends Entity
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
        'First Name' => true,
        'Last Name' => true,
        'phone' => true,
        'email' => true,
        'child_id' => true,
        'children' => true,
        'child_gurdians' => true,
    ];
}
