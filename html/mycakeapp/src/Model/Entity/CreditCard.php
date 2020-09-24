<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CreditCard Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $card_number
 * @property int $expiration_date
 * @property string $card_holder
 * @property int $security_code
 * @property bool $is_deleted
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\User $user
 */
class CreditCard extends Entity
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
        'user_id' => true,
        'card_number' => true,
        'expiration_date' => true,
        'card_holder' => true,
        'security_code' => true,
        'is_deleted' => true,
    ];
}
