<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uploadlog $uploadlog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Uploadlog'), ['action' => 'edit', $uploadlog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Uploadlog'), ['action' => 'delete', $uploadlog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $uploadlog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Uploadlogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Uploadlog'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="uploadlogs view content">
            <h3><?= h($uploadlog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ctipath') ?></th>
                    <td><?= h($uploadlog->ctipath) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ctifile') ?></th>
                    <td><?= h($uploadlog->ctifile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wavfile') ?></th>
                    <td><?= h($uploadlog->wavfile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Clientcode') ?></th>
                    <td><?= h($uploadlog->clientcode) ?></td>
                </tr>
                <tr>
                    <th><?= __('Extension') ?></th>
                    <td><?= h($uploadlog->extension) ?></td>
                </tr>
                <tr>
                    <th><?= __('Job') ?></th>
                    <td><?= $uploadlog->has('job') ? $this->Html->link($uploadlog->job->name, ['controller' => 'Jobs', 'action' => 'view', $uploadlog->job->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Agentname') ?></th>
                    <td><?= h($uploadlog->agentname) ?></td>
                </tr>
                <tr>
                    <th><?= __('Agentpbxid') ?></th>
                    <td><?= h($uploadlog->agentpbxid) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($uploadlog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wavsize') ?></th>
                    <td><?= $this->Number->format($uploadlog->wavsize) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wavtime') ?></th>
                    <td><?= $this->Number->format($uploadlog->wavtime) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($uploadlog->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Uploaded') ?></th>
                    <td><?= h($uploadlog->uploaded) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($uploadlog->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($uploadlog->modified) ?></td>
                </tr>
                <tr>
                    <th><?= __('Notsend') ?></th>
                    <td><?= $uploadlog->notsend ? __('Yes') : __('No'); ?></td>
                </tr>
            </table>
            <div class="related">
                <h4><?= __('Related Sendlogs') ?></h4>
                <?php if (!empty($uploadlog->sendlogs)) : ?>
                <div class="table-responsive">
                    <table>
                        <tr>
                            <th><?= __('Id') ?></th>
                            <th><?= __('Changed') ?></th>
                            <th><?= __('Ctipath') ?></th>
                            <th><?= __('Ctifile') ?></th>
                            <th><?= __('Wavpath') ?></th>
                            <th><?= __('Status') ?></th>
                            <th><?= __('Uploadlog Id') ?></th>
                            <th><?= __('Calldatetime') ?></th>
                            <th><?= __('Processedondate') ?></th>
                            <th><?= __('Disposition') ?></th>
                            <th><?= __('Created') ?></th>
                            <th><?= __('Modified') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                        <?php foreach ($uploadlog->sendlogs as $sendlogs) : ?>
                        <tr>
                            <td><?= h($sendlogs->id) ?></td>
                            <td><?= h($sendlogs->changed) ?></td>
                            <td><?= h($sendlogs->ctipath) ?></td>
                            <td><?= h($sendlogs->ctifile) ?></td>
                            <td><?= h($sendlogs->wavpath) ?></td>
                            <td><?= h($sendlogs->status) ?></td>
                            <td><?= h($sendlogs->uploadlog_id) ?></td>
                            <td><?= h($sendlogs->calldatetime) ?></td>
                            <td><?= h($sendlogs->processedondate) ?></td>
                            <td><?= h($sendlogs->disposition) ?></td>
                            <td><?= h($sendlogs->created) ?></td>
                            <td><?= h($sendlogs->modified) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('View'), ['controller' => 'Sendlogs', 'action' => 'view', $sendlogs->id]) ?>
                                <?= $this->Html->link(__('Edit'), ['controller' => 'Sendlogs', 'action' => 'edit', $sendlogs->id]) ?>
                                <?= $this->Form->postLink(__('Delete'), ['controller' => 'Sendlogs', 'action' => 'delete', $sendlogs->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sendlogs->id)]) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
