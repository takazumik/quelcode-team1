<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reservation Entity
 *
 * @property int $id
 * @property int $cinema_id
 * @property int $seat_id
 * @property \Cake\I18n\Time $birthday
 * @property bool $sex
 * @property int $number_of_people
 * @property bool $is_cancelled
 *
 * @property \App\Model\Entity\Cinema $cinema
 * @property \App\Model\Entity\Seat $seat
 */
class Reservation extends Entity
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
        'cinema_id' => true,
        'seat_id' => true,
        'birthday' => true,
        'sex' => true,
        'number_of_people' => true,
        'is_cancelled' => true,
        'cinema' => true,
        'seat' => true,
    ];
}
