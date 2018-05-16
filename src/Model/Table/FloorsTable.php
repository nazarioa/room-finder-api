<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Floors Model
 *
 * @property \App\Model\Table\BuildingsTable|\Cake\ORM\Association\BelongsTo $Buildings
 * @property \App\Model\Table\MapsTable|\Cake\ORM\Association\BelongsTo $Maps
 * @property \App\Model\Table\RoomsTable|\Cake\ORM\Association\HasMany $Rooms
 *
 * @method \App\Model\Entity\Floor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Floor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Floor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Floor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Floor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Floor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Floor findOrCreate($search, callable $callback = null, $options = [])
 */
class FloorsTable extends Table
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

        $this->setTable('floors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Buildings', [
            'foreignKey' => 'building_id'
        ]);
        $this->belongsTo('Maps', [
            'foreignKey' => 'map_id'
        ]);
        $this->hasMany('Rooms', [
            'foreignKey' => 'floor_id'
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
            ->maxLength('name', 255)
            ->allowEmpty('name');

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
        $rules->add($rules->existsIn(['building_id'], 'Buildings'));
        $rules->add($rules->existsIn(['map_id'], 'Maps'));

        return $rules;
    }
}
