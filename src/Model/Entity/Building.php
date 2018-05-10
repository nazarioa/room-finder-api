<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Building Entity
 *
 * @property int $id
 * @property string $name
 * @property string $address
 * @property string $state
 * @property string $zip
 * @property string $image_coordiantes
 * @property int $map_id
 * @property float $latitude
 * @property float $longitude
 *
 * @property \App\Model\Entity\Map $map
 * @property \App\Model\Entity\Floor[] $floors
 */
class Building extends Entity
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
        'address' => true,
        'state' => true,
        'zip' => true,
        'image_coordiantes' => true,
        'map_id' => true,
        'latitude' => true,
        'longitude' => true,
        'map' => true,
        'floors' => true
    ];
}
