<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Cinemas Model
 *
 * @property \App\Model\Table\ReservationsTable&\Cake\ORM\Association\HasMany $Reservations
 * @property \App\Model\Table\SchedulesTable&\Cake\ORM\Association\HasMany $Schedules
 *
 * @method \App\Model\Entity\Cinema get($primaryKey, $options = [])
 * @method \App\Model\Entity\Cinema newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Cinema[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Cinema|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cinema saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Cinema patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Cinema[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Cinema findOrCreate($search, callable $callback = null, $options = [])
 */
class CinemasTable extends Table
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

        $this->setTable('cinemas');
        $this->setDisplayField('title');
        $this->setPrimaryKey('id');

        $this->hasMany('Reservations', [
            'foreignKey' => 'cinema_id',
        ]);
        $this->hasMany('Schedules', [
            'foreignKey' => 'cinema_id',
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
            ->scalar('title')
            ->maxLength('title', 255)
            ->requirePresence('title', 'create')
            ->notEmptyString('title');

        $validator
            ->scalar('thumbnail_path')
            ->maxLength('thumbnail_path', 255)
            ->requirePresence('thumbnail_path', 'create')
            ->notEmptyString('thumbnail_path');

        $validator
            ->integer('running_time')
            ->requirePresence('running_time', 'create')
            ->notEmptyString('running_time');

        return $validator;
    }
}
