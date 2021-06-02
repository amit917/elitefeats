<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * PendingAssessmentFixture
 */
class PendingAssessmentFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'pending_assessment';
    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'assessment_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'client_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'pending_assessment_assessment_assessment_id_fk' => ['type' => 'index', 'columns' => ['assessment_id'], 'length' => []],
            'pending_assessment_clients_id_fk' => ['type' => 'index', 'columns' => ['client_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'pending_assessment_assessment_assessment_id_fk' => ['type' => 'foreign', 'columns' => ['assessment_id'], 'references' => ['assessment', 'assessment_id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
            'pending_assessment_clients_id_fk' => ['type' => 'foreign', 'columns' => ['client_id'], 'references' => ['clients', 'id'], 'update' => 'restrict', 'delete' => 'restrict', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8mb4_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd
    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'assessment_id' => 1,
                'client_id' => 1,
            ],
        ];
        parent::init();
    }
}
