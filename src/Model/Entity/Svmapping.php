<?php
// src/Model/Entity/Svmapping.php
namespace App\Model\Entity;

use Cake\ORM\Entity;

class Svmapping extends Entity
{
    protected $_accessible = [
        '*' => true,
        'id' => false,
    ];
}