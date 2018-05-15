<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Rooms Model
 *
 * @property \App\Model\Table\FloorsTable|\Cake\ORM\Association\BelongsTo $Floors
 * @property \App\Model\Table\UserRoomsTable|\Cake\ORM\Association\HasMany $UserRooms
 *
 * @method \App\Model\Entity\Room get($primaryKey, $options = [])
 * @method \App\Model\Entity\Room newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Room[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Room|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Room patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Room[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Room findOrCreate($search, callable $callback = null, $options = [])
 */
class RoomsTable extends Table
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

        $this->setTable('rooms');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Floors', [
          'foreignKey' => 'floor_id'
        ]);
        $this->hasMany('UserRooms', [
          'foreignKey' => 'room_id'
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
            ->allowEmpty('id', 'create');

        $validator
            ->scalar('name')
            ->maxLength('name', 50)
            ->allowEmpty('name');

        $validator
            ->scalar('code')
            ->maxLength('code', 20)
            ->allowEmpty('code');

        $validator
            ->scalar('description')
            ->allowEmpty('description');

        $validator
            ->boolean('has_whiteboard')
            ->allowEmpty('has_whiteboard');

        $validator
            ->boolean('has_projection')
            ->allowEmpty('has_projection');

        $validator
            ->allowEmpty('image_coordinates');

        $validator
            ->scalar('calendar_api')
            ->maxLength('calendar_api', 255)
            ->allowEmpty('calendar_api');

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
        $rules->add($rules->existsIn(['floor_id'], 'Floors'));

        return $rules;
    }

    public function findFuzzy(Query $query, array $options)
    {
        return $query->select([
          'Rooms.id',
          'Rooms.name',
          'Rooms.code',
          'Rooms.floor_id',
          'Floors.name',
          'Buildings.name',
          'Buildings.address',
          'Buildings.city',
          'Buildings.state',
        ])->where([
            'or' =>
              [
                'Rooms.name like' => '%' . $options['searchString'] . '%',
                'Rooms.code like' => '%' . $options['searchString'] . '%',
              ]
          ]
        )->join([
          'floors' => [
            'table' => 'floors',
            'type' => 'LEFT',
            'conditions' => 'Rooms.floor_id = Floors.id',
          ],
          'buildings' => [
            'table' => 'buildings',
            'type' => 'LEFT',
            'conditions' => 'Buildings.id = Floors.building_id'
          ]
        ]);
    }
}
