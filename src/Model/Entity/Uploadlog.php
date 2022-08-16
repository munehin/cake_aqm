<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Uploadlog Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime|null $uploaded
 * @property string|null $ctipath
 * @property string|null $ctifile
 * @property string|null $wavfile
 * @property int|null $wavsize
 * @property int|null $wavtime
 * @property string|null $clientcode
 * @property string|null $extension
 * @property int|null $job_id
 * @property string|null $agentname
 * @property string|null $agentpbxid
 * @property int|null $status
 * @property bool|null $notsend
 * @property \Cake\I18n\FrozenTime|null $created
 * @property \Cake\I18n\FrozenTime|null $modified
 *
 * @property \App\Model\Entity\Job $job
 * @property \App\Model\Entity\Sendlog[] $sendlogs
 */
class Uploadlog extends Entity
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
        'ctipath' => true,
        'ctifile' => true,
        'wavfile' => true,
        'wavsize' => true,
        'wavtime' => true,
        'clientcode' => true,
        'extension' => true,
        'job_id' => true,
        'agentname' => true,
        'agentpbxid' => true,
        'status' => true,
        'notsend' => true,
        'created' => true,
        'modified' => true,
        'job' => true,
        'sendlogs' => true,
    ];
}
