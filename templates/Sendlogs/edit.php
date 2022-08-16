<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Sendlog $sendlog
 * @var string[]|\Cake\Collection\CollectionInterface $uploadlogs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $sendlog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $sendlog->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Sendlogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="sendlogs form content">
            <?= $this->Form->create($sendlog) ?>
            <fieldset>
                <legend><?= __('Edit Sendlog') ?></legend>
                <?php
                    echo $this->Form->control('changed', ['empty' => true]);
                    echo $this->Form->control('ctipath');
                    echo $this->Form->control('ctifile');
                    echo $this->Form->control('wavpath');
                    echo $this->Form->control('status');
                    echo $this->Form->control('uploadlog_id', ['options' => $uploadlogs, 'empty' => true]);
                    echo $this->Form->control('calldatetime', ['empty' => true]);
                    echo $this->Form->control('processedondate', ['empty' => true]);
                    echo $this->Form->control('disposition');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
