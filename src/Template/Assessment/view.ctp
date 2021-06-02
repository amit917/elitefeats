<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Assessment $assessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Assessment'), ['action' => 'edit', $assessment->assessment_id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Assessment'), ['action' => 'delete', $assessment->assessment_id], ['confirm' => __('Are you sure you want to delete # {0}?', $assessment->assessment_id)]) ?> </li>
        <li><?= $this->Html->link(__('List Assessment'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assessment'), ['action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="assessment view large-9 medium-8 columns content">
    <h3><?= h($assessment->assessment_id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Assessment Name') ?></th>
            <td><?= h($assessment->assessment_name) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Assessment Id') ?></th>
            <td><?= $this->Number->format($assessment->assessment_id) ?></td>
        </tr>
    </table>
</div>
