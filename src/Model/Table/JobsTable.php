<?php
// src/Model/Table/JobsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class JobsTable extends Table
{
    public function initialize(array $config) : void
    {
        $this->addBehavior('Timestamp');
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('name')
            ->maxLength('name', 256)
            ->maxLength('clientcode', 16)
            ->maxLength('subjob', 16)
            ->allowEmptyString('sendmin')
            ->range('sendmin', [0, 2147483647])
            ->allowEmptyString('sendmax')
            ->range('sendmax', [0, 2147483647])
            ->allowEmptyString('wavmin')
            ->range('wavmin', [0, 2147483647])
            ->allowEmptyString('wavmax')
            ->range('wavmax', [0, 2147483647]);

        return $validator;
    }
}
