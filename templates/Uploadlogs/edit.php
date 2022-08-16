<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uploadlog $uploadlog
 * @var string[]|\Cake\Collection\CollectionInterface $jobs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $uploadlog->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $uploadlog->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Uploadlogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="uploadlogs form content">
            <?= $this->Form->create($uploadlog) ?>
            <fieldset>
                <legend><?= __('Edit Uploadlog') ?></legend>
                <?php
                    echo $this->Form->control('uploaded', ['empty' => true]);
                    echo $this->Form->control('ctipath');
                    echo $this->Form->control('ctifile');
                    echo $this->Form->control('wavfile');
                    echo $this->Form->control('wavsize');
                    echo $this->Form->control('wavtime');
                    echo $this->Form->control('clientcode');
                    echo $this->Form->control('extension');
                    echo $this->Form->control('job_id', ['options' => $jobs, 'empty' => true]);
                    echo $this->Form->control('agentname');
                    echo $this->Form->control('agentpbxid');
                    echo $this->Form->control('status');
                    echo $this->Form->control('notsend');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
