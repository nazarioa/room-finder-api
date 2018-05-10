<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Floor Entity
 *
 * @property int $id
 * @property string $name
 * @property int $building_id
 * @property int $floor_id
 *
 * @property \App\Model\Entity\Building $building
 * @property \App\Model\Entity\Floor[] $floors
 * @property \App\Model\Entity\Room[] $rooms
 */
class Floor extends Entity
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
        'name' => true,
        'building_id' => true,
        'floor_id' => true,
        'building' => true,
        'floors' => true,
        'rooms' => true
    ];
}
