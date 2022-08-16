<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sendlog[]|\Cake\Collection\CollectionInterface $sendlogs
 */
?>
<div class="sendlogs index content">
    <h3><?= __('Sendlogs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('changed') ?></th>
                    <th><?= $this->Paginator->sort('ctifile') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('uploadlog_id') ?></th>
                    <th><?= $this->Paginator->sort('calldatetime') ?></th>
                    <th><?= $this->Paginator->sort('processedondate') ?></th>
                    <th><?= $this->Paginator->sort('disposition') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sendlogs as $sendlog): ?>
                <tr>
                    <td><?= $this->Number->format($sendlog->id) ?></td>
                    <td><?= h($sendlog->changed) ?></td>
                    <td><?= h($sendlog->ctifile) ?></td>
                    <td><?= $this->Number->format($sendlog->status) ?></td>
                    <td><?= $sendlog->has('uploadlog') ? $this->Html->link($sendlog->uploadlog->id, ['controller' => 'Uploadlogs', 'action' => 'view', $sendlog->uploadlog->id]) : '' ?></td>
                    <td><?= h($sendlog->calldatetime) ?></td>
                    <td><?= h($sendlog->processedondate) ?></td>
                    <td><?= h($sendlog->disposition) ?></td>
                    <td><?= h($sendlog->created) ?></td>
                    <td><?= h($sendlog->modified) ?></td>
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
