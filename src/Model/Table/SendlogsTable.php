<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Sendlogs Model
 *
 * @property \App\Model\Table\UploadlogsTable&\Cake\ORM\Association\BelongsTo $Uploadlogs
 *
 * @method \App\Model\Entity\Sendlog newEmptyEntity()
 * @method \App\Model\Entity\Sendlog newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Sendlog[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Sendlog get($primaryKey, $options = [])
 * @method \App\Model\Entity\Sendlog findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Sendlog patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Sendlog[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Sendlog|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sendlog saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Sendlog[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sendlog[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sendlog[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Sendlog[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SendlogsTable extends Table
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

        $this->setTable('sendlogs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Uploadlogs', [
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
            ->dateTime('changed')
            ->allowEmptyDateTime('changed');

        $validator
            ->scalar('ctipath')
            ->maxLength('ctipath', 256)
            ->allowEmptyString('ctipath');

        $validator
            ->scalar('ctifile')
            ->maxLength('ctifile', 64)
            ->allowEmptyFile('ctifile');

        $validator
            ->scalar('wavpath')
            ->maxLength('wavpath', 256)
            ->allowEmptyString('wavpath');

        $validator
            ->integer('status')
            ->allowEmptyString('status');

        $validator
            ->dateTime('calldatetime')
            ->allowEmptyDateTime('calldatetime');

        $validator
            ->dateTime('processedondate')
            ->allowEmptyDateTime('processedondate');

        $validator
            ->scalar('disposition')
            ->maxLength('disposition', 64)
            ->allowEmptyString('disposition');

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
        $rules->add($rules->existsIn('uploadlog_id', 'Uploadlogs'), ['errorField' => 'uploadlog_id']);

        return $rules;
    }
}
