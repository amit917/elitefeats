<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchasedAssessment $purchasedAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $purchasedAssessment->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $purchasedAssessment->id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Purchased Assessments'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Assessment'), ['controller' => 'Assessment', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assessment'), ['controller' => 'Assessment', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchasedAssessments form large-9 medium-8 columns content">
    <?= $this->Form->create($purchasedAssessment) ?>
    <fieldset>
        <legend><?= __('Edit Purchased Assessment') ?></legend>
        <?php
            echo $this->Form->control('assessment_id', ['options' => $assessment]);
            echo $this->Form->control('user_id', ['options' => $users]);
            echo $this->Form->control('quantity');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
