<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Monitors Model
 *
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\BelongsToMany $Students
 *
 * @method \App\Model\Entity\Monitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\Monitor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Monitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Monitor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Monitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Monitor findOrCreate($search, callable $callback = null, $options = [])
 */
class MonitorsTable extends Table
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

        $this->setTable('monitors');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsToMany('Students', [
            'foreignKey' => 'monitor_id',
            'targetForeignKey' => 'student_id',
            'joinTable' => 'students_monitors'
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
            ->maxLength('name', 40)
            ->requirePresence('name', 'create')
            ->notEmpty('name');

        $validator
            ->scalar('discipline')
            ->maxLength('discipline', 30)
            ->requirePresence('discipline', 'create')
            ->notEmpty('discipline');

        return $validator;
    }
}
