<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Summary[]|\Cake\Collection\CollectionInterface $summaries
 */
?>
<div class="summaries index content">
    <h3><?= __('Summaries') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('uploaded') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('ok') ?></th>
                    <th><?= $this->Paginator->sort('ng') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($summaries as $summary): ?>
                <tr>
                    <td><?= $this->Number->format($summary->id) ?></td>
                    <td><?= h($summary->uploaded) ?></td>
                    <td><?= $this->Number->format($summary->total) ?></td>
                    <td><?= $this->Number->format($summary->ok) ?></td>
                    <td><?= $this->Number->format($summary->ng) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['controller' => 'Uploadlogs', 'action' => 'index2', $summary->uploaded->format('Y-m-d')]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
