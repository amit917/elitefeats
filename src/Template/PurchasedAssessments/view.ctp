<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchasedAssessment $purchasedAssessment
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('Edit Purchased Assessment'), ['action' => 'edit', $purchasedAssessment->id]) ?> </li>
        <li><?= $this->Form->postLink(__('Delete Purchased Assessment'), ['action' => 'delete', $purchasedAssessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchasedAssessment->id)]) ?> </li>
        <li><?= $this->Html->link(__('List Purchased Assessments'), ['action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Purchased Assessment'), ['action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Assessment'), ['controller' => 'Assessment', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New Assessment'), ['controller' => 'Assessment', 'action' => 'add']) ?> </li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
    </ul>
</nav>
<div class="purchasedAssessments view large-9 medium-8 columns content">
    <h3><?= h($purchasedAssessment->id) ?></h3>
    <table class="vertical-table">
        <tr>
            <th scope="row"><?= __('Assessment') ?></th>
            <td><?= $purchasedAssessment->has('assessment') ? $this->Html->link($purchasedAssessment->assessment->assessment_id, ['controller' => 'Assessment', 'action' => 'view', $purchasedAssessment->assessment->assessment_id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('User') ?></th>
            <td><?= $purchasedAssessment->has('user') ? $this->Html->link($purchasedAssessment->user->id, ['controller' => 'Users', 'action' => 'view', $purchasedAssessment->user->id]) : '' ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Id') ?></th>
            <td><?= $this->Number->format($purchasedAssessment->id) ?></td>
        </tr>
        <tr>
            <th scope="row"><?= __('Quantity') ?></th>
            <td><?= $this->Number->format($purchasedAssessment->quantity) ?></td>
        </tr>
    </table>
</div>
