<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sendlog $sendlog
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Sendlog'), ['action' => 'edit', $sendlog->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Sendlog'), ['action' => 'delete', $sendlog->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sendlog->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Sendlogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Sendlog'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sendlogs view content">
            <h3><?= h($sendlog->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ctipath') ?></th>
                    <td><?= h($sendlog->ctipath) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ctifile') ?></th>
                    <td><?= h($sendlog->ctifile) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wavpath') ?></th>
                    <td><?= h($sendlog->wavpath) ?></td>
                </tr>
                <tr>
                    <th><?= __('Uploadlog') ?></th>
                    <td><?= $sendlog->has('uploadlog') ? $this->Html->link($sendlog->uploadlog->id, ['controller' => 'Uploadlogs', 'action' => 'view', $sendlog->uploadlog->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Disposition') ?></th>
                    <td><?= h($sendlog->disposition) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($sendlog->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= $this->Number->format($sendlog->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Changed') ?></th>
                    <td><?= h($sendlog->changed) ?></td>
                </tr>
                <tr>
                    <th><?= __('Calldatetime') ?></th>
                    <td><?= h($sendlog->calldatetime) ?></td>
                </tr>
                <tr>
                    <th><?= __('Processedondate') ?></th>
                    <td><?= h($sendlog->processedondate) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($sendlog->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($sendlog->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
