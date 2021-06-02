<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Clients Model
 *
 * @property \App\Model\Table\MembershipsTable&\Cake\ORM\Association\HasMany $Memberships
 * @property \App\Model\Table\UserAssessmentsTable&\Cake\ORM\Association\HasMany $UserAssessments
 *
 * @method \App\Model\Entity\Client get($primaryKey, $options = [])
 * @method \App\Model\Entity\Client newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Client[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Client|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Client patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Client[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Client findOrCreate($search, callable $callback = null, $options = [])
 */
class ClientsTable extends Table
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

        $this->setTable('clients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->hasMany('Memberships', [
            'foreignKey' => 'client_id',
        ]);
        $this->hasMany('UserAssessments', [
            'foreignKey' => 'client_id',
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
            ->scalar('First_name')
            ->maxLength('First_name', 50)
           ->requirePresence('First_name')
            ->notEmptyString('First_name');


        $validator
            ->scalar('Last_name')
            ->maxLength('Last_name', 70)
           ->notEmptyString('Last_name');

        $validator
            ->scalar('Email')
            ->maxLength('Email', 255)
            ->notEmptyString('Email');

       // $validator = new Validator();
       // $validator
       //     ->requirePresence('Email')
       //     ->add('Email', 'validFormat', [
         //       'rule' => 'Email',
         //       'message' => 'E-mail must be valid'
         //   ]);


        return $validator;
    }
}
