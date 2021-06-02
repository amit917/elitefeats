<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Gurdians Model
 *
 * @property \App\Model\Table\ChildrenTable&\Cake\ORM\Association\BelongsTo $Children
 * @property \App\Model\Table\ChildrenTable&\Cake\ORM\Association\HasMany $Children
 * @property \App\Model\Table\GurdiansTable&\Cake\ORM\Association\HasMany $ChildGurdians
 *
 * @method \App\Model\Entity\Gurdian get($primaryKey, $options = [])
 * @method \App\Model\Entity\Gurdian newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Gurdian[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Gurdian|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gurdian saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Gurdian patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Gurdian[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Gurdian findOrCreate($search, callable $callback = null, $options = [])
 */
class GurdiansTable extends Table
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

        $this->setTable('gurdians');
        $this->setDisplayField('parent_id');
        $this->setPrimaryKey('parent_id');

        $this->belongsTo('Children', [
            'foreignKey' => 'child_id',
        ]);
        $this->hasMany('Children', [
            'foreignKey' => 'gurdian_id',
        ]);
        $this->hasMany('ChildGurdians', [
            'className' => 'Gurdians',
            'foreignKey' => 'parent_id',
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
            ->integer('parent_id')
            ->allowEmptyString('parent_id', null, 'create');

        $validator
            ->scalar('First Name')
            ->maxLength('First Name', 70)
            ->requirePresence('First Name', 'create')
            ->notEmptyString('First Name');

        $validator
            ->scalar('Last Name')
            ->maxLength('Last Name', 70)
            ->requirePresence('Last Name', 'create')
            ->notEmptyString('Last Name');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email');

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
        $rules->add($rules->isUnique(['email']));
        $rules->add($rules->existsIn(['child_id'], 'Children'));

        return $rules;
    }
}
