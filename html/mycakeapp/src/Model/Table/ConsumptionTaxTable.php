<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * ConsumptionTax Model
 *
 * @method \App\Model\Entity\ConsumptionTax get($primaryKey, $options = [])
 * @method \App\Model\Entity\ConsumptionTax newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\ConsumptionTax[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\ConsumptionTax|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConsumptionTax saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\ConsumptionTax patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\ConsumptionTax[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\ConsumptionTax findOrCreate($search, callable $callback = null, $options = [])
 */
class ConsumptionTaxTable extends Table
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

        $this->setTable('consumption_tax');
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
            ->integer('consumption_tax')
            ->requirePresence('consumption_tax', 'create')
            ->notEmptyString('consumption_tax');

        return $validator;
    }
}
