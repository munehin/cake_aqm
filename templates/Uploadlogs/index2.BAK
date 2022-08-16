<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uploadlog[]|\Cake\Collection\CollectionInterface $uploadlogs
 */
?>
<div class="uploadlogs index content">
    <?= $this->Html->link(__('Summaries'), ['controller' => 'Summaries', 'action' => 'index'], ['class' => 'button float-right']) ?>
    <h3><?= __('Uploadlogs') ?></h3>
    表示対象日付&nbsp;<?= h($uploaded) ?>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('modified') ?></th>
                    <th><?= $this->Paginator->sort('job_id') ?></th>
                    <th><?= $this->Paginator->sort('ctifile') ?></th>
                    <th><?= $this->Paginator->sort('wavfile') ?></th>
                    <th><?= $this->Paginator->sort('status') ?></th>
                    <th><?= $this->Paginator->sort('disposition') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($uploadlogs as $uploadlog): ?>
                <tr>
                    <td><?= $this->Number->format($uploadlog->id) ?></td>
                    <td><?php
                    		if ($uploadlog->status == 97 || $uploadlog->status == 99) { echo '取込エラー'; }
	                        else if ($uploadlog->status == 98) { echo '対象外'; }
                    		else if (count($uploadlog->sendlogs) > 0) {
                                if ($uploadlog->sendlogs[0]->status == 0) { echo ''; }
                                else if ($uploadlog->sendlogs[0]->status == 1) { echo '成功'; }
                                else { echo '失敗'; }
                            }
                    ?></td>
                    <td><?= count($uploadlog->sendlogs) > 0 ? h($uploadlog->sendlogs[0]->modified) : '' ?></td>
                    <td><?= $uploadlog->has('job') ? h($uploadlog->job->name) : '' ?></td>
                    <td><?= h($uploadlog->ctifile) ?></td>
                    <td><?= h($uploadlog->wavfile) ?></td>
                    <td><?php if ($uploadlog->status == 0) { echo ''; }
                            else if ($uploadlog->status == 1) { echo ''; }
                            else if ($uploadlog->status == 97) { echo 'bs0→bs1'; }
                            else if ($uploadlog->status == 98) { echo 'bs1→bs2'; }
                            else if ($uploadlog->status == 99) { echo 'bs0→bs1'; }
                            else { echo $uploadlog->status; }
                    ?></td>
                    <td><?= count($uploadlog->sendlogs) ? h($uploadlog->sendlogs[0]->disposition) : '' ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('Resend'), ['action' => 'view', $uploadlog->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $uploadlog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uploadlog->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <?= $this->Html->link(__('Export'), ['action' => 'export', $uploaded], ['class' => 'button float-right']) ?><br />
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
