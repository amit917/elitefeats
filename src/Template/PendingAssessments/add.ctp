<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingAssessment $pendingAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('List Pending Assessments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pendingAssessments form large-9 medium-8 columns content">
    <?= $this->Form->create($pendingAssessment) ?>
    <fieldset>
        <legend><?= __('Add Pending Assessment') ?></legend>
        <?php
            echo $this->Form->control('assessment_id');
            echo $this->Form->control('client_id', ['options' => $clients]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
