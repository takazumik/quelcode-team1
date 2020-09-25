<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PaymentHistory Entity
 *
 * @property int $id
 * @property int $schedule_id
 * @property bool $is_cancelled
 * @property int $settlement_price
 * @property int $user_id
 *
 * @property \App\Model\Entity\Schedule $schedule
 * @property \App\Model\Entity\User $user
 */
class PaymentHistory extends Entity
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
        'schedule_id' => true,
        'is_cancelled' => true,
        'settlement_price' => true,
        'user_id' => true,
        'schedule' => true,
        'user' => true,
    ];
}
