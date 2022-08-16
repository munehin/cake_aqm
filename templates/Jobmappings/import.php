<!-- File: templates/jobmappings/upload.php -->

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

	<div class="column-responsive column-80">
	    <div class="svmapping form content">
		    <?= $this->Form->create($jobmapping, ['type' => 'file']) ?>
		    <fieldset>
				<legend><?= __('Import Jobmappings') ?></legend>
				<?php
				    echo $this->Form->control('job_id', ['disabled' => 'true']);
				    echo $this->Form->file('file');
				?>
			</fieldset>
			<?= $this->Form->button(__('Import')) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
