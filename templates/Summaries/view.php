<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Summary $summary
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Summary'), ['action' => 'edit', $summary->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Summary'), ['action' => 'delete', $summary->id], ['confirm' => __('Are you sure you want to delete # {0}?', $summary->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Summaries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Summary'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="summaries view content">
            <h3><?= h($summary->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($summary->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Total') ?></th>
                    <td><?= $this->Number->format($summary->total) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ok') ?></th>
                    <td><?= $this->Number->format($summary->ok) ?></td>
                </tr>
                <tr>
                    <th><?= __('Ng') ?></th>
                    <td><?= $this->Number->format($summary->ng) ?></td>
                </tr>
                <tr>
                    <th><?= __('Wavsize') ?></th>
                    <td><?= $this->Number->format($summary->wavsize) ?></td>
                </tr>
                <tr>
                    <th><?= __('Uploaded') ?></th>
                    <td><?= h($summary->uploaded) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created') ?></th>
                    <td><?= h($summary->created) ?></td>
                </tr>
                <tr>
                    <th><?= __('Modified') ?></th>
                    <td><?= h($summary->modified) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
