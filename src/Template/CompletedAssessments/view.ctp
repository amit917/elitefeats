<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CompletedAssessment $completedAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Completed Assessment'), ['action' => 'edit', $completedAssessment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Completed Assessment'), ['action' => 'delete', $completedAssessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $completedAssessment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Completed Assessments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Completed Assessment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assessment'), ['controller' => 'Assessment', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assessment'), ['controller' => 'Assessment', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="completedAssessments view large-9 medium-8 columns content">
    <h3><?= h($completedAssessment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Assessment') ?></th>
            <td><?= $completedAssessment->has('assessment') ? $this->Html->link($completedAssessment->assessment->assessment_id, ['controller' => 'Assessment', 'action' => 'view', $completedAssessment->assessment->assessment_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $completedAssessment->has('client') ? $this->Html->link($completedAssessment->client->id, ['controller' => 'Clients', 'action' => 'view', $completedAssessment->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($completedAssessment->id) ?></td>
        </tr>
    </table>
</div>
