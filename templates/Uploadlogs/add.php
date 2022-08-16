<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Uploadlog $uploadlog
 * @var \Cake\Collection\CollectionInterface|string[] $jobs
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Uploadlogs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="uploadlogs form content">
            <?= $this->Form->create($uploadlog) ?>
            <fieldset>
                <legend><?= __('Add Uploadlog') ?></legend>
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
