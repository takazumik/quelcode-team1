<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Points Model
 *
 * @method \App\Model\Entity\Point get($primaryKey, $options = [])
 * @method \App\Model\Entity\Point newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Point[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Point|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Point saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Point patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Point[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Point findOrCreate($search, callable $callback = null, $options = [])
 */
class PointsTable extends Table
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

        $this->setTable('points');
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
            ->scalar('point_name')
            ->maxLength('point_name', 255)
            ->requirePresence('point_name', 'create')
            ->notEmptyString('point_name');

        $validator
            ->integer('point_percentage')
            ->requirePresence('point_percentage', 'create')
            ->notEmptyString('point_percentage');

        return $validator;
    }
}
