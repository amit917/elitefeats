<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingAssessment $pendingAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Pending Assessment'), ['action' => 'edit', $pendingAssessment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Pending Assessment'), ['action' => 'delete', $pendingAssessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingAssessment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Pending Assessment'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Pending Assessment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assessment'), ['controller' => 'Assessment', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assessment'), ['controller' => 'Assessment', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="pendingAssessment view large-9 medium-8 columns content">
    <h3><?= h($pendingAssessment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Assessment') ?></th>
            <td><?= $pendingAssessment->has('assessment') ? $this->Html->link($pendingAssessment->assessment->assessment_id, ['controller' => 'Assessment', 'action' => 'view', $pendingAssessment->assessment->assessment_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Client') ?></th>
            <td><?= $pendingAssessment->has('client') ? $this->Html->link($pendingAssessment->client->id, ['controller' => 'Clients', 'action' => 'view', $pendingAssessment->client->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($pendingAssessment->id) ?></td>
        </tr>
    </table>
</div>
