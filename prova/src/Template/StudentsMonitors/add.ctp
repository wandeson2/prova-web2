<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentsMonitor $studentsMonitor
 */
$loguser = $this->request->getSession()->read("Auth.User");

?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Students Monitors'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Students'), ['controller' => 'Students', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Student'), ['controller' => 'Students', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Monitors'), ['controller' => 'Monitors', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Monitor'), ['controller' => 'Monitors', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="studentsMonitors form large-9 medium-8 columns content">
    <?= $this->Form->create($studentsMonitor) ?>
    <fieldset>
        <legend><?= __('Add Students Monitor') ?></legend>
        <?php
            echo $this->Form->control('student_id', ['options' => $students, 'empty' => true]);
            echo $this->Form->control('monitor_id', ['options' => $monitors, 'empty' => true]);
            echo $this->Form->control('date_time_start');
            echo $this->Form->control('date_time_fin');
            echo $this->Form->control('role',  ['label'=>'Status',
            'options' => ['Realizado' => 'Realizado', 'Aluno faltou' => 'Ausente', 'Cancelado'=> 'Cancelado', 'Pendente'=>'Pendente'] ]);               ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
