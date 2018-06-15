<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\StudentsMonitor $studentsMonitor
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $studentsMonitor->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $studentsMonitor->id)]
            )
        ?></li>
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
        <legend><?= __('Edit Students Monitor') ?></legend>
        <?php
            echo $this->Form->control('student_id', ['options' => $students, 'empty' => true]);
            echo $this->Form->control('monitor_id', ['options' => $monitors, 'empty' => true]);
            echo $this->Form->control('date_time_start');
            echo $this->Form->control('date_time_fin');
            echo $this->Form->control('role', [
            'options' => ['Realizado' => 'Realizado', 'AlunoFaltou' => 'AlunoFaltou', 'Cancelado'=> 'Cancelado', 'Pendente'=>'Pendente'] ]);               
        ?>        
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
