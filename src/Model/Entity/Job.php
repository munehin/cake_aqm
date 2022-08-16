<?php
// src/Model/Entity/Job.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Job extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];

    protected function _getWavmin(?int $wavmin) : ?int
    {
        if (is_null($wavmin))
        {
            return $wavmin;
        } else {
            return floor($wavmin / 1024);
		}
    }
    
    protected function _getWavmax(?int $wavmax) : ?int
    {
        if (is_null($wavmax))
        {
            return $wavmax;
        } else {
            return floor($wavmax / 1024);
        }
    }

    protected function _setWavmin(?int $wavmin) : ?int
    {
        if (is_null($wavmin))
        {
            return $wavmin;
        } else {
            return $wavmin * 1024 * 1024;
		}
    }
    
    protected function _setWavmax(?int $wavmax) : ?int
    {
        if (is_null($wavmax))
        {
			return $wavmax;
        } else {
            return $wavmax * 1024 * 1024;
		}
    }
}