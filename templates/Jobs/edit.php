<!-- File: templates/Jobs/edit.php -->

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(__('Delete'), 
                ['action' => 'delete', $job->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $job->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Jobs'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
		<div class="jobs form content">
			<?= $this->Form->create($job) ?>
			<fieldset>
                <legend><?= __('Edit Job') ?></legend>
				<?php
				    echo $this->Form->control('id', ['type' => 'hidden']);
				    echo $this->Form->control('name');
				    echo $this->Form->control('clientcode');
				    echo $this->Form->control('subjob');
				    echo $this->Form->control('sendmin');
				    echo $this->Form->control('sendmax');
				    echo $this->Form->control('wavmin');
				    echo $this->Form->control('wavmax');
				?>
			</fieldset>
            <?= $this->Form->button(__('Submit')) ?>
			<?= $this->Form->end() ?>
		</div>
	</div>
</div>