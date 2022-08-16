<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Summaries Model
 *
 * @method \App\Model\Entity\Summary newEmptyEntity()
 * @method \App\Model\Entity\Summary newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Summary[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Summary get($primaryKey, $options = [])
 * @method \App\Model\Entity\Summary findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Summary patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Summary[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Summary|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Summary saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Summary[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Summary[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Summary[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Summary[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SummariesTable extends Table
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

        $this->setTable('summaries');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->date('uploaded')
            ->allowEmptyDate('uploaded');

        $validator
            ->integer('count')
            ->allowEmptyString('count');

        $validator
            ->integer('ok')
            ->allowEmptyString('ok');

        $validator
            ->integer('ng')
            ->allowEmptyString('ng');

        $validator
            ->integer('wavsize')
            ->allowEmptyString('wavsize');

        return $validator;
    }
}
