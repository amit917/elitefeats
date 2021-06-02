<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PendingAssessment[]|\Cake\Collection\CollectionInterface $pendingAssessments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Pending Assessment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Clients'), ['controller' => 'Clients', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Client'), ['controller' => 'Clients', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="pendingAssessments index large-9 medium-8 columns content">
    <h3><?= __('Pending Assessments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assessment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('client_id') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pendingAssessments as $pendingAssessment): ?>
            <tr>
                <td><?= $this->Number->format($pendingAssessment->id) ?></td>
                <td><?= $this->Number->format($pendingAssessment->assessment_id) ?></td>
                <td><?= $pendingAssessment->has('client') ? $this->Html->link($pendingAssessment->client->id, ['controller' => 'Clients', 'action' => 'view', $pendingAssessment->client->id]) : '' ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $pendingAssessment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $pendingAssessment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $pendingAssessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pendingAssessment->id)]) ?>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
    </div>
</div>
