<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Coaches Model
 *
 * @method \App\Model\Entity\Coach get($primaryKey, $options = [])
 * @method \App\Model\Entity\Coach newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Coach[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Coach|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coach saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Coach patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Coach[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Coach findOrCreate($search, callable $callback = null, $options = [])
 */
class CoachesTable extends Table
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

        $this->setTable('coaches');
        $this->setDisplayField('coach_id');
        $this->setPrimaryKey('coach_id');
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
            ->integer('coach_id')
            ->allowEmptyString('coach_id', null, 'create');

        $validator
            ->scalar('First name')
            ->maxLength('First name', 70)
            ->requirePresence('First name', 'create')
            ->notEmptyString('First name');

        $validator
            ->scalar('Last name')
            ->maxLength('Last name', 70)
            ->requirePresence('Last name', 'create')
            ->notEmptyString('Last name');

        $validator
            ->integer('phone')
            ->requirePresence('phone', 'create')
            ->notEmptyString('phone');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 255)
            ->requirePresence('Email', 'create')
            ->notEmptyString('Email');

        return $validator;
    }
}
