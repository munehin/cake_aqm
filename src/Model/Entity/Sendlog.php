<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sendlog Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $changed
 * @property string|null $ctipath
 * @property string|null $ctifile
 * @property string|null $wavpath
 * @property int|null $status
 * @property int|null $uploadlog_id
 * @property \Cake\I18n\FrozenTime|null $calldatetime
 * @property \Cake\I18n\FrozenTime|null $processedondate
 * @property string|null $disposition
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Uploadlog $uploadlog
 */
class Sendlog extends Entity
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
        'changed' => true,
        'ctipath' => true,
        'ctifile' => true,
        'wavpath' => true,
        'status' => true,
        'uploadlog_id' => true,
        'calldatetime' => true,
        'processedondate' => true,
        'disposition' => true,
        'created' => true,
        'modified' => true,
        'uploadlog' => true,
    ];
}
