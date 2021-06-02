<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompletedAssessment $completedAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $completedAssessment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $completedAssessment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Completed Assessments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Assessment'), ['controller' => 'Assessment', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assessment'), ['controller' => 'Assessment', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="completedAssessments form large-9 medium-8 columns content">
    <?= $this->Form->create($completedAssessment) ?>
    <fieldset>
        <legend><?= __('Edit Completed Assessment') ?></legend>
        <?php
            echo $this->Form->control('assessment_id', ['options' => $assessment]);
            echo $this->Form->control('client_id', ['options' => $clients]);
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
