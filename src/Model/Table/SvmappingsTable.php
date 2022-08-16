<?php
 // src/Model/Table/SvmappingsTable.php
namespace App\Model\Table;

use Cake\ORM\Table;
use Cake\Validation\Validator;

class SvmappingsTable extends Table
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
            ->notEmptyString('agentpbxid')
            ->maxLength('agentpbxid', 16)
            ->maxLength('agentname', 32)
            ->maxLength('supervisorname', 32)
            ->maxLength('agentid', 16)
            ->range('job_id', [0, 2147483647]);

        return $validator;
    }
}
