<!-- File: templates/Svmappings/index.php -->
<div class="svmappings index content">
    <?= $this->Html->link(__('New Svmapping'), ['action' => 'add'], ['class' => 'button float-right']) ?>
	<h3><?= __('Svmappings') ?></h3>
	
    <?= $this->Form->create($param, ['type' => 'get']) ?>
    <fieldset>
		<?php echo $this->Form->control('job_id'); ?>
        <?php echo $this->Form->control('agentpbxid', ['required' => false]); ?>
        <?php echo $this->Form->control('agentid', ['required' => false]); ?>
        <?php echo $this->Form->control('agentname', ['required' => false]); ?>
    </fieldset>
    <?= $this->Form->button(__('Search')) ?>
    <?= $this->Form->end() ?>
	
    <div class="table-responsive">
		<table>
		    <tr>
		        <th><?= $this->Paginator->sort('id') ?></th>
		        <th><?= $this->Paginator->sort('agentpbxid') ?></th>
		        <th><?= $this->Paginator->sort('agentname') ?></th>
		        <th><?= $this->Paginator->sort('supervisorname') ?></th>
		        <th><?= $this->Paginator->sort('agentid') ?></th>
		        <th><?= $this->Paginator->sort('job_id') ?></th>
		        <th><?= $this->Paginator->sort('created') ?></th>
		        <th><?= $this->Paginator->sort('modified') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
		    </tr>

		    <?php foreach ($svmappings as $svmapping): ?>
		    <tr>
		        <td>
		            <?= h($svmapping->id) ?>
		        </td>
		        <td>
		            <?= h($svmapping->agentpbxid) ?>
		        </td>
		        <td>
		            <?= h($svmapping->agentname) ?>
		        </td>
		        <td>
		            <?= h($svmapping->supervisorname) ?>
		        </td>
		        <td>
		            <?= h($svmapping->agentid) ?>
		        </td>
		        <td>
		            <?= $svmapping->has('job') ? h($svmapping->job->name) : '' ?>
		        </td>
		        <td>
		            <?= h($svmapping->created) ?>
		        </td>
		        <td>
		            <?php if (isset($svmapping->modified)) { ?>
		                <?= h($svmapping->modified) ?>
		            <?php } ?>
		        </td>
                <td class="actions">
                    <?= $this->Html->link(__('Edit'), ['action' => 'edit', $svmapping->id]) ?><br />
                    <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $svmapping->id], ['confirm' => __('Are you sure you want to delete # {0}?', $svmapping->id)]) ?>
                </td>
	        </tr>
		    <?php endforeach; ?>
		</table>
    </div>
    <div>
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
</div>
	
	