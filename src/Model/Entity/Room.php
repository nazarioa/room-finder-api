<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Room Entity
 *
 * @property int $id
 * @property string $name
 * @property string $code
 * @property string $description
 * @property bool $has_whiteboard
 * @property bool $has_projection
 * @property string|resource $image_coordinates
 * @property int $floor_id
 * @property string $calendar_api
 *
 * @property \App\Model\Entity\Floor $floor
 * @property \App\Model\Entity\UserRoom[] $user_rooms
 */
class Room extends Entity
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
        'code' => true,
        'description' => true,
        'has_whiteboard' => true,
        'has_projection' => true,
        'image_coordinates' => true,
        'floor_id' => true,
        'calendar_api' => true,
        'floor' => true,
        'user_rooms' => true
    ];
}
