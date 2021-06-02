<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\PurchasedAssessment[]|\Cake\Collection\CollectionInterface $purchasedAssessments
 */
?>
<nav class="large-3 medium-4 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?= $this->Html->link(__('New Purchased Assessment'), ['action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Assessment'), ['controller' => 'Assessment', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Assessment'), ['controller' => 'Assessment', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="purchasedAssessments index large-9 medium-8 columns content">
    <h3><?= __('Purchased Assessments') ?></h3>
    <table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('assessment_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('user_id') ?></th>
                <th scope="col"><?= $this->Paginator->sort('quantity') ?></th>
                <th scope="col" class="actions"><?= __('Actions') ?></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($purchasedAssessments as $purchasedAssessment): ?>
            <tr>
                <td><?= $this->Number->format($purchasedAssessment->id) ?></td>
                <td><?= $purchasedAssessment->has('assessment') ? $this->Html->link($purchasedAssessment->assessment->assessment_id, ['controller' => 'Assessment', 'action' => 'view', $purchasedAssessment->assessment->assessment_id]) : '' ?></td>
                <td><?= $purchasedAssessment->has('user') ? $this->Html->link($purchasedAssessment->user->id, ['controller' => 'Users', 'action' => 'view', $purchasedAssessment->user->id]) : '' ?></td>
                <td><?= $this->Number->format($purchasedAssessment->quantity) ?></td>
                <td class="actions">
                    <?= $this->Html->link(__('View'), ['action' => 'view', $purchasedAssessment->id]) ?>
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $purchasedAssessment->id]) ?>
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $purchasedAssessment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $purchasedAssessment->id)]) ?>
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
