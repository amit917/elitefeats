<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assessment $assessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $assessment->assessment_id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $assessment->assessment_id)]
            )
        ?></li>
        <li><?= $this->Html->link(__('List Assessment'), ['action' => 'index']) ?></li>
    </ul>
</nav>
<div class="assessment form large-9 medium-8 columns content">
    <?= $this->Form->create($assessment) ?>
    <fieldset>
        <legend><?= __('Edit Assessment') ?></legend>
        <?php
            echo $this->Form->control('assessment_name');
        ?>
    </fieldset>
    <?= $this->Form->button(__('Submit')) ?>
    <?= $this->Form->end() ?>
</div>
