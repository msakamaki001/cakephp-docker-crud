<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query\SelectQuery;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Points Model
 *
 * @property \App\Model\Table\CalcsTable&\Cake\ORM\Association\HasMany $Calcs
 *
 * @method \App\Model\Entity\Point newEmptyEntity()
 * @method \App\Model\Entity\Point newEntity(array $data, array $options = [])
 * @method array<\App\Model\Entity\Point> newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Point get(mixed $primaryKey, array|string $finder = 'all', \Psr\SimpleCache\CacheInterface|string|null $cache = null, \Closure|string|null $cacheKey = null, mixed ...$args)
 * @method \App\Model\Entity\Point findOrCreate($search, ?callable $callback = null, array $options = [])
 * @method \App\Model\Entity\Point patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method array<\App\Model\Entity\Point> patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Point|false save(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method \App\Model\Entity\Point saveOrFail(\Cake\Datasource\EntityInterface $entity, array $options = [])
 * @method iterable<\App\Model\Entity\Point>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Point>|false saveMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Point>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Point> saveManyOrFail(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Point>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Point>|false deleteMany(iterable $entities, array $options = [])
 * @method iterable<\App\Model\Entity\Point>|\Cake\Datasource\ResultSetInterface<\App\Model\Entity\Point> deleteManyOrFail(iterable $entities, array $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PointsTable extends Table
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

        $this->setTable('points');
        $this->setDisplayField('medical_details');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->hasMany('Calcs', [
            'foreignKey' => 'point_id',
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
            ->scalar('medical_details')
            ->maxLength('medical_details', 255)
            ->requirePresence('medical_details', 'create')
            ->notEmptyString('medical_details');

        $validator
            ->integer('point')
            ->requirePresence('point', 'create')
            ->notEmptyString('point');

        $validator
            ->integer('updated_id')
            ->requirePresence('updated_id', 'create')
            ->notEmptyString('updated_id');

        return $validator;
    }
}
