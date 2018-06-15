<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * StudentsMonitors Model
 *
 * @property \App\Model\Table\StudentsTable|\Cake\ORM\Association\BelongsTo $Students
 * @property \App\Model\Table\MonitorsTable|\Cake\ORM\Association\BelongsTo $Monitors
 *
 * @method \App\Model\Entity\StudentsMonitor get($primaryKey, $options = [])
 * @method \App\Model\Entity\StudentsMonitor newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\StudentsMonitor[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\StudentsMonitor|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudentsMonitor|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\StudentsMonitor patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\StudentsMonitor[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\StudentsMonitor findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class StudentsMonitorsTable extends Table
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

        $this->setTable('students_monitors');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Students', [
            'foreignKey' => 'student_id'
        ]);
        $this->belongsTo('Monitors', [
            'foreignKey' => 'monitor_id'
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
            ->dateTime('date_time_start')
            ->requirePresence('date_time_start', 'create')
            ->notEmpty('date_time_start');

        $validator
            ->dateTime('date_time_fin')
            ->requirePresence('date_time_fin', 'create')
            ->notEmpty('date_time_fin');

        $validator
            ->scalar('role')
            ->maxLength('role', 20)
            ->requirePresence('role', 'create')
            ->notEmpty('role')
            ->add('role', 'inList', [
            'rule' => ['inList', ['Realizado','AlunoFaltou','Cancelado','Pendente']],
            'message' => 'Por favor entre com um papel válido!']);


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
        $rules->add($rules->existsIn(['student_id'], 'Students'));
        $rules->add($rules->existsIn(['monitor_id'], 'Monitors'));

        return $rules;
    }
}
