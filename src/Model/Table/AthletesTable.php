<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Athletes Model
 *
 * @property \App\Model\Table\SportsTable&\Cake\ORM\Association\BelongsTo $Sports
 * @property \App\Model\Table\ModulesTable&\Cake\ORM\Association\BelongsTo $Modules
 * @property \App\Model\Table\AssessmentTable&\Cake\ORM\Association\BelongsTo $Assessment
 *
 * @method \App\Model\Entity\Athlete get($primaryKey, $options = [])
 * @method \App\Model\Entity\Athlete newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Athlete[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Athlete|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Athlete saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Athlete patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Athlete[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Athlete findOrCreate($search, callable $callback = null, $options = [])
 */
class AthletesTable extends Table
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

        $this->setTable('athletes');
        $this->setDisplayField('athlete_id');
        $this->setPrimaryKey('athlete_id');

        $this->belongsTo('Sports', [
            'foreignKey' => 'sports_id',
        ]);
        $this->belongsTo('Modules', [
            'foreignKey' => 'module_id',
        ]);
        $this->belongsTo('Assessment', [
            'foreignKey' => 'asses_id',
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
            ->integer('athlete_id')
            ->allowEmptyString('athlete_id', null, 'create');

        $validator
            ->scalar('first_name')
            ->maxLength('first_name', 70)
            ->requirePresence('first_name', 'create')
            ->notEmptyString('first_name');

        $validator
            ->scalar('last_name')
            ->maxLength('last_name', 70)
            ->requirePresence('last_name', 'create')
            ->notEmptyString('last_name');

        $validator
            ->integer('age')
            ->requirePresence('age', 'create')
            ->notEmptyString('age');

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
        $rules->add($rules->existsIn(['sports_id'], 'Sports'));
        $rules->add($rules->existsIn(['module_id'], 'Modules'));
        $rules->add($rules->existsIn(['asses_id'], 'Assessment'));

        return $rules;
    }
}
