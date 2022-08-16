<?php
// src/Model/Table/JobmappingsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class JobmappingsTable extends Table
{
    public function initialize(array $config) : void
    {
        $this->addBehavior('Timestamp');
        
        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
        ]);
    }

    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->notEmptyString('extension')
            ->maxLength('extension', 16)
            ->maxLength('clientcode', 16)
            ->maxLength('subjob', 16)
            ->maxLength('areacode', 16)
            ->maxLength('areaname', 32)
            ->maxLength('centercode', 16)
            ->maxLength('centername', 32)
            ->range('job_id', [0, 2147483647]);

        return $validator;
    }
}
