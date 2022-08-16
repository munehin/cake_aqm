<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Jobmapping $jobmapping
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Jobmappings'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="Jobmappings form content">
            <?= $this->Form->create($jobmapping) ?>
            <fieldset>
                <legend><?= __('Add Jobmapping') ?></legend>
                <?php
                    echo $this->Form->control('job_id');
                    echo $this->Form->control('extension');
                    echo $this->Form->control('clientcode');
                    echo $this->Form->control('subjob');
                    echo $this->Form->control('areacode', ['type' => 'text', 'list' => 'dl']);
                    echo $this->Form->control('areaname');
                    echo $this->Form->control('centercode');
                    echo $this->Form->control('centername');
                ?>
            </fieldset>
            <datalist id='dl'>
		        <?php foreach ($areacodes as $areacode): ?>
				<option value='<?= h($areacode->areacode) ?>'>
		        <?php endforeach; ?>
            </datalist>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
