<?php
// src/Model/Entity/Jobmapping.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Jobmapping extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}