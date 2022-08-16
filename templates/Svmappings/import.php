<!-- File: templates/svmappings/upload.php -->

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Jobs'), ['controller' => 'Jobs', 'action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>

	<div class="column-responsive column-80">
	    <div class="svmapping form content">
		    <?= $this->Form->create($svmapping, ['type' => 'file']) ?>
		    <fieldset>
				<legend><?= __('Import Svmappings') ?></legend>
				<?php
				    echo $this->Form->control('job_id', ['disabled' => 'true']);
				    echo $this->Form->file('file', ["label" => "ƒtƒ@ƒCƒ‹"]);
				?>
			</fieldset>
			<?= $this->Form->button(__('Import')) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>
