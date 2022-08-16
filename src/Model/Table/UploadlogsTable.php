<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Uploadlogs Model
 *
 * @property \App\Model\Table\JobsTable&\Cake\ORM\Association\BelongsTo $Jobs
 * @property \App\Model\Table\SendlogsTable&\Cake\ORM\Association\HasMany $Sendlogs
 *
 * @method \App\Model\Entity\Uploadlog newEmptyEntity()
 * @method \App\Model\Entity\Uploadlog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Uploadlog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Uploadlog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Uploadlog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Uploadlog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Uploadlog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Uploadlog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uploadlog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Uploadlog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Uploadlog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Uploadlog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Uploadlog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UploadlogsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('uploadlogs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Jobs', [
            'foreignKey' => 'job_id',
        ]);
        $this->hasMany('Sendlogs', [
            'foreignKey' => 'uploadlog_id',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->dateTime('uploaded')
            ->allowEmptyDateTime('uploaded');

        $validator
            ->scalar('ctipath')
            ->maxLength('ctipath', 256)
            ->allowEmptyString('ctipath');

        $validator
            ->scalar('ctifile')
            ->maxLength('ctifile', 64)
            ->allowEmptyFile('ctifile');

        $validator
            ->scalar('wavfile')
            ->maxLength('wavfile', 64)
            ->allowEmptyFile('wavfile');

        $validator
            ->integer('wavsize')
            ->allowEmptyString('wavsize');

        $validator
            ->integer('wavtime')
            ->allowEmptyString('wavtime');

        $validator
            ->scalar('clientcode')
            ->maxLength('clientcode', 16)
            ->allowEmptyString('clientcode');

        $validator
            ->scalar('extension')
            ->maxLength('extension', 16)
            ->allowEmptyString('extension');

        $validator
            ->scalar('agentname')
            ->maxLength('agentname', 32)
            ->allowEmptyString('agentname');

        $validator
            ->scalar('agentpbxid')
            ->maxLength('agentpbxid', 16)
            ->allowEmptyString('agentpbxid');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->boolean('notsend')
            ->allowEmptyString('notsend');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('job_id', 'Jobs'), ['errorField' => 'job_id']);

        return $rules;
    }
}
