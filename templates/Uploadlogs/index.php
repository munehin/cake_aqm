<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uploadlog[]|\Cake\Collection\CollectionInterface $uploadlogs
 */
?>
<div class="uploadlogs index content">
    <h3><?= __('Uploadlogs') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('uploaded') ?></th>
                    <th><?= $this->Paginator->sort('ctifile') ?></th>
                    <th><?= $this->Paginator->sort('wavfile') ?></th>
                    <th><?= $this->Paginator->sort('wavsize') ?></th>
                    <th><?= $this->Paginator->sort('wavtime') ?></th>
                    <th><?= $this->Paginator->sort('clientcode') ?></th>
                    <th><?= $this->Paginator->sort('extension') ?></th>
                    <th><?= $this->Paginator->sort('job_id') ?></th>
                    <th><?= $this->Paginator->sort('agentname') ?></th>
                    <th><?= $this->Paginator->sort('agentpbxid') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('notsend') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uploadlogs as $uploadlog): ?>
                <tr>
                    <td><?= $this->Number->format($uploadlog->id) ?></td>
                    <td><?= h($uploadlog->uploaded) ?></td>
                    <td><?= h($uploadlog->ctifile) ?></td>
                    <td><?= h($uploadlog->wavfile) ?></td>
                    <td><?= $this->Number->format($uploadlog->wavsize) ?></td>
                    <td><?= $this->Number->format($uploadlog->wavtime) ?></td>
                    <td><?= h($uploadlog->clientcode) ?></td>
                    <td><?= h($uploadlog->extension) ?></td>
                    <td><?= $uploadlog->has('job') ? h($uploadlog->job->name) : '' ?></td>
                    <td><?= h($uploadlog->agentname) ?></td>
                    <td><?= h($uploadlog->agentpbxid) ?></td>
                    <td><?= $this->Number->format($uploadlog->status) ?></td>
                    <td><?= h($uploadlog->notsend) ?></td>
                    <td><?= h($uploadlog->created) ?></td>
                    <td><?= h($uploadlog->modified) ?></td>
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
