<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * PaymentHistories Model
 *
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\BelongsTo $Schedules
 * @property \App\Model\Table\UsersTable&\Cake\ORM\Association\BelongsTo $Users
 *
 * @method \App\Model\Entity\PaymentHistory get($primaryKey, $options = [])
 * @method \App\Model\Entity\PaymentHistory newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\PaymentHistory[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\PaymentHistory|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentHistory saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\PaymentHistory patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentHistory[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\PaymentHistory findOrCreate($search, callable $callback = null, $options = [])
 */
class PaymentHistoriesTable extends Table
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

        $this->setTable('payment_histories');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Schedules', [
            'foreignKey' => 'schedule_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER',
        ]);
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
            ->boolean('is_cancelled')
            ->notEmptyString('is_cancelled');

        $validator
            ->integer('settlement_price')
            ->requirePresence('settlement_price', 'create')
            ->notEmptyString('settlement_price');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['schedule_id'], 'Schedules'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
