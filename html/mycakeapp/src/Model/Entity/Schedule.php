<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Schedule Entity
 *
 * @property int $id
 * @property int $cinema_id
 * @property \Cake\I18n\Time $start_time
 *
 * @property \App\Model\Entity\Cinema $cinema
 * @property \App\Model\Entity\PaymentHistory[] $payment_histories
 */
class Schedule extends Entity
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
        'start_time' => true,
        'cinema' => true,
        'payment_histories' => true,
    ];
}
