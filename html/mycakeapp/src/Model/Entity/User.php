<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;
use Token\Model\Entity\TokenTrait;
/**
 * User Entity
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property bool $is_deleted
 * @property bool $is_registrated
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class User extends Entity
{
    use TokenTrait;
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
        'email' => true,
        'password' => true,
        'is_deleted' => true,
        'is_registrated' => true,
        'created' => true,
        'modified' => true,
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
    ];
    protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }
}
