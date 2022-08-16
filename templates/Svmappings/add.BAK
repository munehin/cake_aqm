<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Svmapping $svmapping
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Svmappings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="svmappings form content">
            <?= $this->Form->create($svmapping) ?>
            <fieldset>
                <legend><?= __('Add Svmapping') ?></legend>
                <?php
                    echo $this->Form->control('job_id');
                    echo $this->Form->control('agentpbxid');
                    echo $this->Form->control('agentname');
                    echo $this->Form->control('supervisorname');
                    echo $this->Form->control('agentid');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
