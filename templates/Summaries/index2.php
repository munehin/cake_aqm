<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Summary[]|\Cake\Collection\CollectionInterface $summaries
 */
?>
<div class="summaries index content">
    <h3><?= __('Summaries') ?></h3>
    
    <?= $this->Form->create(null, ['type' => 'get']) ?>
    <fieldset>
        <table>
            <tr>
                <td width="50%"><?php echo $this->Form->control('name1', ['type' => 'checkbox', 'label' => 'ONE CONTACT']); ?></td>
                <td width="50%"><?php echo $this->Form->control('name2', ['type' => 'checkbox', 'label' => '地域CC']); ?></td>
            </tr>
            <tr style='vertical-align:bottom'>
                <td><?php echo $this->Form->control('start', ['type' => 'date', 'label' => '日付']); ?></td>
                <td><?php echo $this->Form->control('end', ['type' => 'date', 'label' => false]); ?></td>
            </tr>
            <tr>
                <td><?php echo $this->Form->control('keyword', ['label' => 'JOB']); ?></td>
                <td>&nbsp;</td>
            </tr>
        </table>
    </fieldset>
    <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end() ?>
    
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('uploaded') ?></th>
                    <th><?= $this->Paginator->sort('name') ?></th>
                    <th><?= $this->Paginator->sort('total') ?></th>
                    <th><?= $this->Paginator->sort('wavsize') ?></th>
                    <th><?= $this->Paginator->sort('created') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($summaries as $summary): ?>
                <tr>
                    <td><?= $this->Number->format($summary->id) ?></td>
                    <td><?= h($summary->uploaded) ?></td>
                    <td><?= h($summary->name) ?></td>
                    <td><?= $this->Number->format($summary->total) ?></td>
                    <td><?= $this->Number->format($summary->wavsize) ?></td>
                    <td><?= h($summary->created) ?></td>
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
