<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Calcs Model
 *
 * @property \App\Model\Table\PointsTable&\Cake\ORM\Association\BelongsTo $Points
 *
 * @method \App\Model\Entity\Calc newEmptyEntity()
 * @method \App\Model\Entity\Calc newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Calc> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Calc get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Calc findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Calc patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Calc> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Calc|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Calc saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Calc>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Calc>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Calc>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Calc> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Calc>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Calc>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Calc>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Calc> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class CalcsTable extends Table
{
    /**
     * Initialize method
     *
     * @param array<string, mixed> $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('calcs');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Points', [
            'foreignKey' => 'point_id',
            'joinType' => 'INNER',
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
            ->integer('patient_id')
            ->notEmptyString('patient_id');

        $validator
            ->integer('point_id')
            ->notEmptyString('point_id');

        $validator
            ->integer('one_point_yen')
            ->notEmptyString('one_point_yen');

        $validator
            ->numeric('out_of_pocket_medical_expenses')
            ->requirePresence('out_of_pocket_medical_expenses', 'create')
            ->notEmptyString('out_of_pocket_medical_expenses');

        $validator
            ->integer('updated_id')
            ->allowEmptyString('updated_id');

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
        $rules->add($rules->existsIn(['patient_id'], 'Patients'), ['errorField' => 'patient_id']);
        $rules->add($rules->existsIn(['point_id'], 'Points'), ['errorField' => 'point_id']);

        return $rules;
    }
}
