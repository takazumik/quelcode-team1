<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PointHistories Model
 *
 * @method \App\Model\Entity\PointHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PointHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PointHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PointHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PointHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PointHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PointHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PointHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class PointHistoriesTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('point_histories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmptyString('id', null, 'create');

        $validator
            ->scalar('Point_histories')
            ->maxLength('Point_histories', 255)
            ->requirePresence('Point_histories', 'create')
            ->notEmptyString('Point_histories');

        $validator
            ->requirePresence('payment_history', 'create')
            ->notEmptyString('payment_history');

        $validator
            ->integer('point')
            ->requirePresence('point', 'create')
            ->notEmptyString('point');

        return $validator;
    }
}
