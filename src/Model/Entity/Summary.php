<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Summary Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenDate|null $uploaded
 * @property int|null $count
 * @property int|null $ok
 * @property int|null $ng
 * @property int|null $wavsize
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 */
class Summary extends Entity
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
        'uploaded' => true,
        'count' => true,
        'ok' => true,
        'ng' => true,
        'wavsize' => true,
        'created' => true,
        'modified' => true,
    ];
}
