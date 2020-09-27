<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Prices Model
 *
 * @method \App\Model\Entity\Price get($primaryKey, $options = [])
 * @method \App\Model\Entity\Price newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Price[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Price|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Price saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Price patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Price[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Price findOrCreate($search, callable $callback = null, $options = [])
 */
class PricesTable extends Table
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

        $this->setTable('prices');
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
            ->scalar('classification')
            ->maxLength('classification', 255)
            ->requirePresence('classification', 'create')
            ->notEmptyString('classification');

        $validator
            ->integer('price')
            ->requirePresence('price', 'create')
            ->notEmptyString('price');

        return $validator;
    }
}
